import { useCallback, useEffect, useMemo, useRef, useState } from "react";
import { useMutation } from "@tanstack/react-query";
import {
  BrowserMultiFormatReader,
  type IScannerControls,
} from "@zxing/browser";
import { getApiErrorMessage } from "@/hooks/useAuth";
import { useResourceListQuery } from "@/hooks/useResourceCrud";
import { Button } from "@/components/ui/button";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import api from "@/services/api";

type ShiftOption = {
  id: string;
  name: string;
  start_time?: string;
  end_time?: string;
};

type LocationOption = {
  id: string;
  name: string;
  qr_token?: string;
};

type ScanAttendancePayload = {
  qr_token: string;
  shift_id: string;
  check_in_lat: number;
  check_in_long: number;
};

type ScanAttendanceResult = {
  id: string;
  status: "on_time" | "late";
  late_minutes: number;
  date: string;
  clock_in: string;
};

const SCAN_COOLDOWN_MS = 5000;
const AUTO_RESTART_MS = 2500;

const isLocalhostHost = (hostname: string) => {
  return (
    hostname === "localhost" || hostname === "127.0.0.1" || hostname === "::1"
  );
};

const getCameraStartErrorMessage = (error: unknown) => {
  if (!(error instanceof Error)) {
    return "Gagal mengaktifkan kamera.";
  }

  if (
    error.name === "NotAllowedError" ||
    error.name === "PermissionDeniedError"
  ) {
    return "Izin kamera ditolak. Aktifkan izin kamera untuk browser ini di pengaturan HP.";
  }

  if (error.name === "NotFoundError" || error.name === "DevicesNotFoundError") {
    return "Kamera tidak ditemukan di perangkat ini.";
  }

  if (error.name === "NotReadableError" || error.name === "TrackStartError") {
    return "Kamera sedang dipakai aplikasi lain. Tutup aplikasi kamera lalu coba lagi.";
  }

  if (error.name === "SecurityError") {
    return "Akses kamera diblokir. Gunakan HTTPS atau buka dari localhost saat development.";
  }

  return error.message || "Gagal mengaktifkan kamera.";
};

const parseTokenFromScanText = (text: string) => {
  const cleaned = text.trim();
  const prefix = "PKHR::ATTENDANCE_LOCATION::";

  if (cleaned.startsWith(prefix)) {
    return cleaned.slice(prefix.length);
  }

  return cleaned;
};

const getMinutesFromTime = (time: string) => {
  const [hours = "0", minutes = "0"] = time.split(":");
  return Number(hours) * 60 + Number(minutes);
};

const getDefaultShiftId = (shifts: ShiftOption[]) => {
  if (shifts.length === 0) {
    return "";
  }

  const now = new Date();
  const currentMinutes = now.getHours() * 60 + now.getMinutes();

  return shifts.find((shift) => {
    if (!shift.start_time || !shift.end_time) {
      return false;
    }

    const startMinutes = getMinutesFromTime(shift.start_time);
    const endMinutes = getMinutesFromTime(shift.end_time);

    if (startMinutes <= endMinutes) {
      return currentMinutes >= startMinutes && currentMinutes < endMinutes;
    }

    return currentMinutes >= startMinutes || currentMinutes < endMinutes;
  })?.id;
};

function EmployeePage() {
  const shiftsQuery = useResourceListQuery("/shifts");
  const locationsQuery = useResourceListQuery("/attendanceLocations");

  const [selectedShiftId, setSelectedShiftId] = useState("");
  const [selectedLocationId, setSelectedLocationId] = useState("");
  const [qrToken, setQrToken] = useState("");
  const [latitude, setLatitude] = useState("");
  const [longitude, setLongitude] = useState("");
  const [geoError, setGeoError] = useState<string | null>(null);
  const [scanMessage, setScanMessage] = useState<string | null>(null);
  const [isScannerActive, setIsScannerActive] = useState(false);
  const [isAutoSubmitting, setIsAutoSubmitting] = useState(false);
  const [isAutoRestartEnabled, setIsAutoRestartEnabled] = useState(true);

  const videoRef = useRef<HTMLVideoElement | null>(null);
  const scannerReaderRef = useRef<BrowserMultiFormatReader | null>(null);
  const scannerControlsRef = useRef<IScannerControls | null>(null);
  const lastScanRef = useRef<{ token: string; timestamp: number } | null>(null);
  const handleScannedTokenRef = useRef<(token: string) => void>(
    () => undefined,
  );
  const restartTimerRef = useRef<number | null>(null);

  const shifts = useMemo<ShiftOption[]>(
    () =>
      (shiftsQuery.data ?? []).map((item) => ({
        id: String(item.id),
        name: String(item.name ?? "-"),
        start_time:
          typeof item.start_time === "string" ? item.start_time : undefined,
        end_time: typeof item.end_time === "string" ? item.end_time : undefined,
      })),
    [shiftsQuery.data],
  );

  useEffect(() => {
    if (selectedShiftId || shifts.length === 0) {
      return;
    }

    setSelectedShiftId(getDefaultShiftId(shifts) || shifts[0].id);
  }, [selectedShiftId, shifts]);

  const locations = useMemo<LocationOption[]>(
    () =>
      (locationsQuery.data ?? []).map((item) => ({
        id: String(item.id),
        name: String(item.name ?? "-"),
        qr_token:
          typeof item.qr_token === "string" && item.qr_token.length > 0
            ? item.qr_token
            : undefined,
      })),
    [locationsQuery.data],
  );

  const scanMutation = useMutation({
    mutationFn: async (payload: ScanAttendancePayload) => {
      const response = await api.post<{ data: ScanAttendanceResult }>(
        "/attendances/scan-qr",
        payload,
      );
      return response.data.data;
    },
  });

  const requestCurrentLocation = useCallback(() => {
    return new Promise<{ latitude: number; longitude: number }>(
      (resolve, reject) => {
        if (!navigator.geolocation) {
          reject(new Error("Browser tidak mendukung geolocation."));
          return;
        }

        navigator.geolocation.getCurrentPosition(
          (position) => {
            resolve({
              latitude: position.coords.latitude,
              longitude: position.coords.longitude,
            });
          },
          (error) => {
            reject(
              new Error(error.message || "Gagal mengambil lokasi saat ini."),
            );
          },
          {
            enableHighAccuracy: true,
            timeout: 10000,
          },
        );
      },
    );
  }, []);

  const submitAttendance = useCallback(
    async (token: string) => {
      if (!selectedShiftId) {
        setScanMessage("Pilih shift dulu sebelum auto-submit presensi.");
        return;
      }

      let lat = Number(latitude);
      let long = Number(longitude);

      if (Number.isNaN(lat) || Number.isNaN(long)) {
        const coords = await requestCurrentLocation();
        lat = coords.latitude;
        long = coords.longitude;
        setLatitude(coords.latitude.toFixed(7));
        setLongitude(coords.longitude.toFixed(7));
      }

      await scanMutation.mutateAsync({
        qr_token: token,
        shift_id: selectedShiftId,
        check_in_lat: lat,
        check_in_long: long,
      });
    },
    [
      latitude,
      longitude,
      requestCurrentLocation,
      scanMutation,
      selectedShiftId,
    ],
  );

  const stopScanner = useCallback(() => {
    if (restartTimerRef.current !== null) {
      window.clearTimeout(restartTimerRef.current);
      restartTimerRef.current = null;
    }

    scannerControlsRef.current?.stop();
    scannerControlsRef.current = null;
    setIsScannerActive(false);
  }, []);

  const startScanner = useCallback(async () => {
    const isSecureOrLocalhost =
      window.isSecureContext || isLocalhostHost(window.location.hostname);

    if (!isSecureOrLocalhost) {
      setScanMessage(
        "Kamera di HP hanya bisa dipakai pada HTTPS. Buka aplikasi lewat https://... atau localhost.",
      );
      return;
    }

    if (!navigator.mediaDevices?.getUserMedia) {
      setScanMessage(
        "Browser ini belum menyediakan API kamera. Coba buka lewat Chrome/Safari terbaru (bukan in-app browser).",
      );
      return;
    }

    if (!videoRef.current || isScannerActive) {
      return;
    }

    setScanMessage("Arahkan kamera ke QR lokasi...");

    try {
      const reader = scannerReaderRef.current ?? new BrowserMultiFormatReader();

      scannerReaderRef.current = reader;

      const controls = await reader.decodeFromVideoDevice(
        undefined,
        videoRef.current,
        (result, error) => {
          if (result) {
            const scannedText = result.getText();
            const parsedToken = parseTokenFromScanText(scannedText);
            stopScanner();
            handleScannedTokenRef.current(parsedToken);
            return;
          }

          if (error && (error as Error).name !== "NotFoundException") {
            setScanMessage("Gagal membaca QR. Coba atur fokus/jarak kamera.");
          }
        },
      );

      scannerControlsRef.current = controls;
      setIsScannerActive(true);
    } catch (error) {
      setScanMessage(getCameraStartErrorMessage(error));
      stopScanner();
    }
  }, [isScannerActive, stopScanner]);

  const handleScannedToken = useCallback(
    async (token: string) => {
      const now = Date.now();
      const last = lastScanRef.current;

      if (
        last &&
        last.token === token &&
        now - last.timestamp < SCAN_COOLDOWN_MS
      ) {
        setScanMessage("QR yang sama baru saja terbaca. Tunggu sebentar...");
        return;
      }

      lastScanRef.current = { token, timestamp: now };
      setQrToken(token);
      setIsAutoSubmitting(true);

      try {
        setScanMessage("QR terdeteksi. Mengirim presensi otomatis...");
        await submitAttendance(token);

        if (isAutoRestartEnabled) {
          setScanMessage(
            "Presensi otomatis berhasil dikirim. Scanner akan aktif lagi...",
          );

          restartTimerRef.current = window.setTimeout(() => {
            restartTimerRef.current = null;
            void startScanner();
          }, AUTO_RESTART_MS);
        } else {
          setScanMessage("Presensi otomatis berhasil dikirim.");
        }
      } catch (error) {
        setScanMessage(
          error instanceof Error
            ? error.message
            : "Auto-submit presensi gagal. Silakan kirim manual.",
        );
      } finally {
        setIsAutoSubmitting(false);
      }
    },
    [isAutoRestartEnabled, startScanner, submitAttendance],
  );

  useEffect(() => {
    handleScannedTokenRef.current = (token: string) => {
      void handleScannedToken(token);
    };
  }, [handleScannedToken]);

  useEffect(() => {
    void startScanner();
  }, [startScanner]);

  useEffect(() => {
    return () => {
      stopScanner();
      scannerReaderRef.current = null;

      if (restartTimerRef.current !== null) {
        window.clearTimeout(restartTimerRef.current);
        restartTimerRef.current = null;
      }
    };
  }, [stopScanner]);

  const handleUseMyLocation = () => {
    if (!navigator.geolocation) {
      setGeoError("Browser tidak mendukung geolocation.");
      return;
    }

    setGeoError(null);

    navigator.geolocation.getCurrentPosition(
      (position) => {
        setLatitude(position.coords.latitude.toFixed(7));
        setLongitude(position.coords.longitude.toFixed(7));
      },
      (error) => {
        setGeoError(error.message || "Gagal mengambil lokasi saat ini.");
      },
      {
        enableHighAccuracy: true,
        timeout: 10000,
      },
    );
  };

  const handleLocationSelect = (locationId: string) => {
    setSelectedLocationId(locationId);

    const location = locations.find((item) => item.id === locationId);
    if (location?.qr_token) {
      setQrToken(location.qr_token);
    }
  };

  const handleSubmit = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    const lat = Number(latitude);
    const long = Number(longitude);

    if (
      !selectedShiftId ||
      !qrToken ||
      Number.isNaN(lat) ||
      Number.isNaN(long)
    ) {
      return;
    }

    await scanMutation.mutateAsync({
      qr_token: qrToken,
      shift_id: selectedShiftId,
      check_in_lat: lat,
      check_in_long: long,
    });
  };

  return (
    <div className="mx-auto max-w-2xl space-y-4">
      <Card>
        <CardHeader>
          <CardTitle>Scan QR Presensi</CardTitle>
          <CardDescription>
            Pilih shift, isi token QR lokasi, lalu kirim presensi dengan
            koordinat GPS Anda.
          </CardDescription>
        </CardHeader>
        <CardContent>
          <form className="space-y-4" onSubmit={handleSubmit}>
            <div className="space-y-2">
              <Label htmlFor="shift">Shift</Label>
              <select
                id="shift"
                className="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-xs"
                value={selectedShiftId}
                onChange={(event) => setSelectedShiftId(event.target.value)}
              >
                <option value="">Pilih shift</option>
                {shifts.map((shift) => (
                  <option key={shift.id} value={shift.id}>
                    {shift.name}
                  </option>
                ))}
              </select>
            </div>

            <div className="space-y-2">
              <Label htmlFor="location">Lokasi (isi token otomatis)</Label>
              <select
                id="location"
                className="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-xs"
                value={selectedLocationId}
                onChange={(event) => handleLocationSelect(event.target.value)}
              >
                <option value="">Pilih lokasi (opsional)</option>
                {locations.map((location) => (
                  <option key={location.id} value={location.id}>
                    {location.name}
                  </option>
                ))}
              </select>
              {locationsQuery.isLoading ? (
                <p className="text-xs text-muted-foreground">
                  Memuat lokasi...
                </p>
              ) : null}
            </div>

            <div className="space-y-2">
              <Label htmlFor="qrToken">Token QR Lokasi</Label>
              <div className="overflow-hidden rounded-md border border-border bg-muted/20 p-2">
                <video
                  ref={videoRef}
                  className="h-56 w-full rounded-md bg-black object-cover"
                  muted
                  playsInline
                />
                <div className="mt-2 flex flex-wrap gap-2">
                  <Button
                    type="button"
                    variant="outline"
                    onClick={stopScanner}
                    disabled={!isScannerActive}
                  >
                    Stop Scanner
                  </Button>
                  <Button
                    type="button"
                    variant="outline"
                    onClick={() => void startScanner()}
                    disabled={isScannerActive}
                  >
                    Mulai Ulang Scanner
                  </Button>
                </div>
                <p className="mt-2 text-xs text-muted-foreground">
                  Scanner kamera aktif otomatis saat halaman dibuka. Input
                  manual tetap tersedia.
                </p>
                <p className="mt-1 text-xs text-muted-foreground">
                  Catatan HP: kamera memerlukan HTTPS dan izin kamera browser.
                </p>
                <label className="mt-2 flex items-center gap-2 text-xs text-muted-foreground">
                  <input
                    type="checkbox"
                    checked={isAutoRestartEnabled}
                    onChange={(event) =>
                      setIsAutoRestartEnabled(event.target.checked)
                    }
                  />
                  Aktifkan auto-restart scanner setelah presensi berhasil
                </label>
              </div>
              <Input
                id="qrToken"
                placeholder="Tempel hasil scan QR di sini"
                value={qrToken}
                onChange={(event) => setQrToken(event.target.value)}
              />
            </div>

            <div className="grid grid-cols-1 gap-3 md:grid-cols-2">
              <div className="space-y-2">
                <Label htmlFor="latitude">Latitude</Label>
                <Input
                  id="latitude"
                  value={latitude}
                  onChange={(event) => setLatitude(event.target.value)}
                  placeholder="-6.2088000"
                />
              </div>
              <div className="space-y-2">
                <Label htmlFor="longitude">Longitude</Label>
                <Input
                  id="longitude"
                  value={longitude}
                  onChange={(event) => setLongitude(event.target.value)}
                  placeholder="106.8456000"
                />
              </div>
            </div>

            <div className="flex flex-wrap gap-2">
              <Button
                type="button"
                variant="outline"
                onClick={handleUseMyLocation}
                disabled={isAutoSubmitting}
              >
                Gunakan Lokasi Saya
              </Button>
              <Button
                type="submit"
                disabled={scanMutation.isPending || isAutoSubmitting}
              >
                {scanMutation.isPending || isAutoSubmitting
                  ? "Memproses..."
                  : "Kirim Presensi"}
              </Button>
            </div>

            {geoError ? (
              <p className="text-sm text-destructive">{geoError}</p>
            ) : null}

            {scanMessage ? (
              <p className="text-sm text-muted-foreground">{scanMessage}</p>
            ) : null}

            {shiftsQuery.isError ? (
              <p className="text-sm text-destructive">
                Gagal mengambil data shift.
              </p>
            ) : null}

            {scanMutation.isError ? (
              <p className="text-sm text-destructive">
                {getApiErrorMessage(scanMutation.error)}
              </p>
            ) : null}

            {scanMutation.isSuccess ? (
              <div className="rounded-md border border-emerald-600/20 bg-emerald-50 p-3 text-sm text-emerald-900">
                Presensi berhasil. Status:{" "}
                <strong>{scanMutation.data.status}</strong>
                {scanMutation.data.status === "late"
                  ? ` (${scanMutation.data.late_minutes} menit terlambat)`
                  : ""}
                .
              </div>
            ) : null}
          </form>
        </CardContent>
      </Card>
    </div>
  );
}

export default EmployeePage;
