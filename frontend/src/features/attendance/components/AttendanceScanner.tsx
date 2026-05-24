import { useMemo, useState } from "react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import type { AttendanceShiftOption, AttendanceScanPayload } from "../types";

type AttendanceScannerProps = {
  shiftOptions: AttendanceShiftOption[];
  isSubmitting: boolean;
  onSubmit: (payload: AttendanceScanPayload) => Promise<void> | void;
};

const getDefaultShiftId = (shifts: AttendanceShiftOption[]) => {
  if (shifts.length === 0) {
    return "";
  }

  const now = new Date();
  const currentMinutes = now.getHours() * 60 + now.getMinutes();

  const parseMinutes = (time?: string) => {
    if (!time) {
      return null;
    }

    const [hours = "0", minutes = "0"] = time.split(":");
    return Number(hours) * 60 + Number(minutes);
  };

  return (
    shifts.find((shift) => {
      const startMinutes = parseMinutes(shift.start_time);
      const endMinutes = parseMinutes(shift.end_time);

      if (startMinutes === null || endMinutes === null) {
        return false;
      }

      if (startMinutes <= endMinutes) {
        return currentMinutes >= startMinutes && currentMinutes < endMinutes;
      }

      return currentMinutes >= startMinutes || currentMinutes < endMinutes;
    })?.id ?? shifts[0].id
  );
};

function AttendanceScanner({
  shiftOptions,
  isSubmitting,
  onSubmit,
}: AttendanceScannerProps) {
  const [qrToken, setQrToken] = useState("");
  const [shiftId, setShiftId] = useState(() => getDefaultShiftId(shiftOptions));
  const [latitude, setLatitude] = useState("");
  const [longitude, setLongitude] = useState("");
  const [message, setMessage] = useState<string | null>(null);

  const shiftCountLabel = useMemo(() => {
    if (shiftOptions.length === 0) {
      return "Tidak ada shift tersedia";
    }

    return `${shiftOptions.length} shift tersedia`;
  }, [shiftOptions.length]);

  const requestCurrentLocation = async () => {
    if (!navigator.geolocation) {
      throw new Error("Browser tidak mendukung geolocation.");
    }

    return new Promise<{ latitude: number; longitude: number }>((resolve, reject) => {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          resolve({
            latitude: position.coords.latitude,
            longitude: position.coords.longitude,
          });
        },
        (error) => {
          reject(new Error(error.message || "Gagal mengambil lokasi saat ini."));
        },
        { enableHighAccuracy: true, timeout: 10000 },
      );
    });
  };

  const handleUseCurrentLocation = async () => {
    try {
      setMessage("Mengambil lokasi saat ini...");
      const coords = await requestCurrentLocation();
      setLatitude(coords.latitude.toFixed(7));
      setLongitude(coords.longitude.toFixed(7));
      setMessage("Lokasi berhasil diisi dari perangkat.");
    } catch (error) {
      setMessage(error instanceof Error ? error.message : "Gagal mengambil lokasi.");
    }
  };

  const handleSubmit = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    const lat = Number(latitude);
    const long = Number(longitude);

    if (!qrToken.trim()) {
      setMessage("QR token wajib diisi.");
      return;
    }

    if (!shiftId) {
      setMessage("Pilih shift terlebih dahulu.");
      return;
    }

    if (Number.isNaN(lat) || Number.isNaN(long)) {
      setMessage("Latitude dan longitude harus berupa angka.");
      return;
    }

    await onSubmit({
      qr_token: qrToken.trim(),
      shift_id: shiftId,
      check_in_lat: lat,
      check_in_long: long,
    });

    setMessage("Presensi berhasil dikirim.");
    setQrToken("");
  };

  return (
    <Card>
      <CardHeader>
        <CardTitle>Scan Presensi</CardTitle>
        <CardDescription>
          Input token QR lokasi, pilih shift, lalu kirim presensi dari halaman attendance.
        </CardDescription>
      </CardHeader>
      <CardContent>
        <form className="space-y-4" onSubmit={handleSubmit}>
          <div className="space-y-2">
            <Label htmlFor="qr_token">QR Token</Label>
            <Input
              id="qr_token"
              value={qrToken}
              onChange={(event) => setQrToken(event.target.value)}
              placeholder="PKHR::ATTENDANCE_LOCATION::..."
            />
          </div>

          <div className="space-y-2">
            <Label htmlFor="shift_id">Shift</Label>
            <select
              id="shift_id"
              className="h-10 w-full rounded-md border border-input bg-background px-3 text-sm"
              value={shiftId}
              onChange={(event) => setShiftId(event.target.value)}
            >
              <option value="">Pilih shift</option>
              {shiftOptions.map((shift) => (
                <option key={shift.id} value={shift.id}>
                  {shift.name}
                  {shift.start_time && shift.end_time
                    ? ` (${shift.start_time} - ${shift.end_time})`
                    : ""}
                </option>
              ))}
            </select>
            <p className="text-xs text-muted-foreground">{shiftCountLabel}</p>
          </div>

          <div className="grid gap-4 md:grid-cols-2">
            <div className="space-y-2">
              <Label htmlFor="latitude">Latitude</Label>
              <Input
                id="latitude"
                value={latitude}
                onChange={(event) => setLatitude(event.target.value)}
                placeholder="-6.2009"
              />
            </div>
            <div className="space-y-2">
              <Label htmlFor="longitude">Longitude</Label>
              <Input
                id="longitude"
                value={longitude}
                onChange={(event) => setLongitude(event.target.value)}
                placeholder="106.8166"
              />
            </div>
          </div>

          <div className="flex flex-col gap-3 sm:flex-row">
            <Button type="button" variant="outline" onClick={handleUseCurrentLocation}>
              Pakai Lokasi Saat Ini
            </Button>
            <Button type="submit" disabled={isSubmitting}>
              {isSubmitting ? "Mengirim..." : "Kirim Presensi"}
            </Button>
          </div>

          {message ? <p className="text-sm text-muted-foreground">{message}</p> : null}
        </form>
      </CardContent>
    </Card>
  );
}

export default AttendanceScanner;