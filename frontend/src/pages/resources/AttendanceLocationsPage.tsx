import { useEffect, useMemo, useRef, useState } from "react";
import {
  MapContainer,
  Marker,
  TileLayer,
  useMap,
  useMapEvents,
} from "react-leaflet";
import L from "leaflet";
import "leaflet/dist/leaflet.css";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import QRCode from "qrcode";
import {
  resourceConfigMap,
  type ResourceField,
} from "@/features/resources/resource-config";
import {
  useCreateResourceMutation,
  useDeleteResourceMutation,
  useResourceListQuery,
  useShowResourceMutation,
  useUpdateResourceMutation,
  type ResourceRecord,
} from "@/hooks/useResourceCrud";
import { getApiErrorMessage } from "@/hooks/useAuth";
import api from "@/services/api";
import type { ApiResponse } from "@/types";

const config = resourceConfigMap["attendanceLocations"];
const defaultCenter: [number, number] = [-6.2009, 106.8166];

const markerIcon = L.divIcon({
  className: "",
  html: '<div style="position:relative;width:34px;height:34px;display:flex;align-items:center;justify-content:center;"><div style="position:absolute;inset:0;border-radius:9999px;background:rgba(239,68,68,0.22);transform:scale(1.18);"></div><div style="position:relative;width:34px;height:34px;border-radius:9999px;background:#ef4444;border:3px solid #ffffff;color:#ffffff;font-size:18px;line-height:1;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 24px rgba(0,0,0,.30);">📍</div></div>',
  iconSize: [34, 34],
  iconAnchor: [17, 30],
});

const prettyJson = (value: unknown) => JSON.stringify(value, null, 2);

const getFieldDefaultValue = (
  field: ResourceField,
  samplePayload: Record<string, unknown>,
) => {
  if (samplePayload[field.key] !== undefined) {
    return samplePayload[field.key];
  }

  if (field.type === "checkbox") {
    return false;
  }

  return "";
};

const buildDefaultFormState = () =>
  Object.fromEntries(
    config.fields.map((field) => [
      field.key,
      getFieldDefaultValue(field, config.samplePayload),
    ]),
  ) as Record<string, unknown>;

const buildFormFromRecord = (row: ResourceRecord) =>
  Object.fromEntries(
    config.fields.map((field) => [
      field.key,
      row[field.key] ?? getFieldDefaultValue(field, config.samplePayload),
    ]),
  ) as Record<string, unknown>;

const normalizePayload = (form: Record<string, unknown>) => {
  const payload: Record<string, unknown> = {};

  config.fields.forEach((field) => {
    const rawValue = form[field.key];

    if (rawValue === "" || rawValue === null || rawValue === undefined) {
      return;
    }

    if (field.type === "number") {
      const parsed = Number(rawValue);
      if (!Number.isNaN(parsed)) {
        payload[field.key] = parsed;
      }
      return;
    }

    if (field.type === "checkbox") {
      payload[field.key] = Boolean(rawValue);
      return;
    }

    payload[field.key] = rawValue;
  });

  return payload;
};

const toCoordinate = (value: unknown) => {
  const parsed = Number(value);
  return Number.isFinite(parsed) ? parsed : null;
};

type LocationMode = "create" | "edit";

type GeocodeResponse = {
  display_name?: string;
};

type QrPreviewData = {
  location_id: string;
  name: string;
  is_active: boolean;
  qr_token: string;
  qr_payload: string;
  qr_image_data_url: string;
};

type LocationMapPickerProps = {
  latitude: unknown;
  longitude: unknown;
  onPick: (latitude: number, longitude: number) => void;
};

function MapClickHandler({ onPick }: { onPick: (latitude: number, longitude: number) => void }) {
  useMapEvents({
    click(event) {
      onPick(event.latlng.lat, event.latlng.lng);
    },
  });

  return null;
}

function MapViewSync({ center }: { center: [number, number] }) {
  const map = useMap();

  useEffect(() => {
    map.setView(center, map.getZoom(), { animate: false });
  }, [center, map]);

  return null;
}

function LocationMapPicker({ latitude, longitude, onPick }: LocationMapPickerProps) {
  const center = useMemo(() => {
    const lat = toCoordinate(latitude);
    const lng = toCoordinate(longitude);

    if (lat !== null && lng !== null) {
      return [lat, lng] as [number, number];
    }

    return defaultCenter;
  }, [latitude, longitude]);

  return (
    <div className="overflow-hidden rounded-xl border border-border bg-muted/20">
      <div className="border-b border-border bg-background px-4 py-3">
        <p className="text-sm font-medium">Pilih titik lokasi</p>
        <p className="text-xs text-muted-foreground">
          Klik peta atau geser marker. Latitude dan longitude akan terisi otomatis.
        </p>
      </div>
      <MapContainer
        center={center}
        zoom={14}
        scrollWheelZoom
        className="h-90 w-full"
      >
        <MapViewSync center={center} />
        <MapClickHandler onPick={onPick} />
        <TileLayer
          attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
        <Marker
          position={center}
          draggable
          icon={markerIcon}
          eventHandlers={{
            dragend(event) {
              const marker = event.target;
              const position = marker.getLatLng();
              onPick(position.lat, position.lng);
            },
          }}
        />
      </MapContainer>
    </div>
  );
}

function AttendanceLocationsPage() {
  const [createForm, setCreateForm] = useState<Record<string, unknown>>({});
  const [editForm, setEditForm] = useState<Record<string, unknown>>({});
  const [editingId, setEditingId] = useState<string | null>(null);
  const [selectedDetail, setSelectedDetail] = useState<ResourceRecord | null>(null);
  const [selectedQrPreview, setSelectedQrPreview] = useState<QrPreviewData | null>(null);
  const [isLoadingQrPreview, setIsLoadingQrPreview] = useState(false);
  const [qrPreviewError, setQrPreviewError] = useState<string | null>(null);
  const [locationMessages, setLocationMessages] = useState<{
    create: string | null;
    edit: string | null;
  }>({ create: null, edit: null });
  const [isLocating, setIsLocating] = useState({
    create: false,
    edit: false,
  });
  const [resolvedAddress, setResolvedAddress] = useState<{
    create: string | null;
    edit: string | null;
  }>({ create: null, edit: null });
  const [isResolvingAddress, setIsResolvingAddress] = useState({
    create: false,
    edit: false,
  });
  const requestCounterRef = useRef({ create: 0, edit: 0 });

  const listQuery = useResourceListQuery(config.endpoint);
  const createMutation = useCreateResourceMutation(config.endpoint);
  const updateMutation = useUpdateResourceMutation(config.endpoint);
  const deleteMutation = useDeleteResourceMutation(config.endpoint);
  const showMutation = useShowResourceMutation(config.endpoint);

  const rows = useMemo(() => listQuery.data ?? [], [listQuery.data]);

  useEffect(() => {
    setCreateForm(buildDefaultFormState());
    setEditForm(buildDefaultFormState());
    setEditingId(null);
    setSelectedDetail(null);
    setLocationMessages({ create: null, edit: null });
    setResolvedAddress({ create: null, edit: null });
  }, []);

  const resolveAddress = async (
    mode: LocationMode,
    latitude: number,
    longitude: number,
  ) => {
    requestCounterRef.current[mode] += 1;
    const requestId = requestCounterRef.current[mode];

    setIsResolvingAddress((previous) => ({ ...previous, [mode]: true }));

    try {
      const response = await fetch(
        `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`,
        {
          headers: {
            Accept: "application/json",
          },
        },
      );

      if (!response.ok) {
        throw new Error(`Gagal memuat alamat (status ${response.status})`);
      }

      const data = (await response.json()) as GeocodeResponse;

      if (requestCounterRef.current[mode] !== requestId) {
        return;
      }

      setResolvedAddress((previous) => ({
        ...previous,
        [mode]: data.display_name ?? "Alamat tidak ditemukan.",
      }));
    } catch (error) {
      if (requestCounterRef.current[mode] !== requestId) {
        return;
      }

      setResolvedAddress((previous) => ({
        ...previous,
        [mode]:
          error instanceof Error
            ? error.message
            : "Gagal melakukan reverse geocoding.",
      }));
    } finally {
      if (requestCounterRef.current[mode] === requestId) {
        setIsResolvingAddress((previous) => ({ ...previous, [mode]: false }));
      }
    }
  };

  const setFormValue = (
    mode: "create" | "edit",
    field: ResourceField,
    value: string | boolean,
  ) => {
    if (mode === "create") {
      setCreateForm((previous) => ({ ...previous, [field.key]: value }));
      return;
    }

    setEditForm((previous) => ({ ...previous, [field.key]: value }));
  };

  const setCoordinates = (
    mode: LocationMode,
    latitude: number,
    longitude: number,
  ) => {
    const nextValues = {
      latitude,
      longitude,
    };

    if (mode === "create") {
      setCreateForm((previous) => ({ ...previous, ...nextValues }));
      return;
    }

    setEditForm((previous) => ({ ...previous, ...nextValues }));
  };

  const requestCurrentLocation = (mode: LocationMode) => {
    if (!navigator.geolocation) {
      setLocationMessages((previous) => ({
        ...previous,
        [mode]: "Browser tidak mendukung geolocation.",
      }));
      return;
    }

    setIsLocating((previous) => ({ ...previous, [mode]: true }));
    setLocationMessages((previous) => ({ ...previous, [mode]: null }));

    navigator.geolocation.getCurrentPosition(
      (position) => {
        setCoordinates(
          mode,
          position.coords.latitude,
          position.coords.longitude,
        );
        setLocationMessages((previous) => ({
          ...previous,
          [mode]: `Lokasi saat ini dipakai: ${position.coords.latitude.toFixed(6)}, ${position.coords.longitude.toFixed(6)}`,
        }));
        setIsLocating((previous) => ({ ...previous, [mode]: false }));
      },
      (error) => {
        setLocationMessages((previous) => ({
          ...previous,
          [mode]: error.message,
        }));
        setIsLocating((previous) => ({ ...previous, [mode]: false }));
      },
      {
        enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 0,
      },
    );
  };

  useEffect(() => {
    const latitude = toCoordinate(createForm.latitude);
    const longitude = toCoordinate(createForm.longitude);

    if (latitude === null || longitude === null) {
      setResolvedAddress((previous) => ({ ...previous, create: null }));
      setIsResolvingAddress((previous) => ({ ...previous, create: false }));
      return;
    }

    const timer = window.setTimeout(() => {
      void resolveAddress("create", latitude, longitude);
    }, 700);

    return () => window.clearTimeout(timer);
  }, [createForm.latitude, createForm.longitude]);

  useEffect(() => {
    const latitude = toCoordinate(editForm.latitude);
    const longitude = toCoordinate(editForm.longitude);

    if (latitude === null || longitude === null) {
      setResolvedAddress((previous) => ({ ...previous, edit: null }));
      setIsResolvingAddress((previous) => ({ ...previous, edit: false }));
      return;
    }

    const timer = window.setTimeout(() => {
      void resolveAddress("edit", latitude, longitude);
    }, 700);

    return () => window.clearTimeout(timer);
  }, [editForm.latitude, editForm.longitude]);

  const handleCreate = async () => {
    const payload = normalizePayload(createForm);
    await createMutation.mutateAsync(payload);
    setCreateForm(buildDefaultFormState());
  };

  const handleStartEdit = (row: ResourceRecord) => {
    setEditingId(row.id);
    setEditForm(buildFormFromRecord(row));
  };

  const handleUpdate = async () => {
    if (!editingId) {
      return;
    }

    const payload = normalizePayload(editForm);
    await updateMutation.mutateAsync({ id: editingId, payload });
    setEditingId(null);
    setEditForm(buildDefaultFormState());
  };

  const handleShow = async (id: string) => {
    const result = await showMutation.mutateAsync(id);
    setSelectedDetail(result);
  };

  const handleDelete = async (id: string) => {
    if (!window.confirm("Yakin ingin menghapus data ini?")) {
      return;
    }

    await deleteMutation.mutateAsync(id);
  };

  const handleLoadQr = async (row: ResourceRecord) => {
    setIsLoadingQrPreview(true);
    setQrPreviewError(null);

    try {
      const response = await api.get<
        ApiResponse<{
          location_id: string;
          name: string;
          is_active: boolean;
          qr_token: string;
          qr_payload: string;
        }>
      >(`/attendanceLocations/${row.id}/qr`);

      const payload = response.data.data;
      const qrImage = await QRCode.toDataURL(payload.qr_payload, {
        width: 360,
        margin: 2,
      });

      setSelectedQrPreview({
        ...payload,
        qr_image_data_url: qrImage,
      });
    } catch (error) {
      setQrPreviewError(getApiErrorMessage(error));
    } finally {
      setIsLoadingQrPreview(false);
    }
  };

  const handlePrintQr = () => {
    if (!selectedQrPreview) {
      return;
    }

    const popup = window.open("", "_blank", "width=900,height=700");
    if (!popup) {
      setQrPreviewError("Popup diblokir browser. Izinkan popup untuk print QR.");
      return;
    }

    const title = `QR Presensi - ${selectedQrPreview.name}`;

    popup.document.open();
    popup.document.write(`
      <!doctype html>
      <html>
        <head>
          <meta charset="utf-8" />
          <title>${title}</title>
          <style>
            body { font-family: Arial, sans-serif; padding: 32px; color: #111827; }
            .container { max-width: 520px; margin: 0 auto; text-align: center; }
            h1 { font-size: 24px; margin-bottom: 6px; }
            p { margin: 6px 0; }
            img { width: 320px; height: 320px; border: 1px solid #d1d5db; padding: 10px; border-radius: 8px; }
            .meta { margin-top: 12px; font-size: 13px; color: #374151; word-break: break-all; }
          </style>
        </head>
        <body>
          <div class="container">
            <h1>${selectedQrPreview.name}</h1>
            <p>QR Presensi Lokasi</p>
            <img src="${selectedQrPreview.qr_image_data_url}" alt="QR ${selectedQrPreview.name}" />
            <div class="meta">
              <p><strong>Token:</strong> ${selectedQrPreview.qr_token}</p>
              <p><strong>Payload:</strong> ${selectedQrPreview.qr_payload}</p>
            </div>
          </div>
          <script>
            window.onload = function () { window.print(); };
          </script>
        </body>
      </html>
    `);
    popup.document.close();
  };

  const renderField = (mode: "create" | "edit", field: ResourceField) => {
    const form = mode === "create" ? createForm : editForm;
    const value = form[field.key];

    if (field.key === "latitude" || field.key === "longitude") {
      return null;
    }

    if (field.type === "textarea") {
      return (
        <div key={`${mode}-${field.key}`} className="space-y-2">
          <Label htmlFor={`${mode}-${field.key}`}>{field.label}</Label>
          <textarea
            id={`${mode}-${field.key}`}
            className="min-h-24 w-full rounded-md border border-border bg-background px-3 py-2 text-sm"
            required={field.required}
            placeholder={field.placeholder}
            value={String(value ?? "")}
            onChange={(event) => setFormValue(mode, field, event.target.value)}
          />
        </div>
      );
    }

    if (field.type === "select") {
      return (
        <div key={`${mode}-${field.key}`} className="space-y-2">
          <Label htmlFor={`${mode}-${field.key}`}>{field.label}</Label>
          <select
            id={`${mode}-${field.key}`}
            className="h-10 w-full rounded-md border border-border bg-background px-3 text-sm"
            required={field.required}
            value={String(value ?? "")}
            onChange={(event) => setFormValue(mode, field, event.target.value)}
          >
            <option value="">Pilih {field.label}</option>
          </select>
        </div>
      );
    }

    if (field.type === "checkbox") {
      return (
        <label
          key={`${mode}-${field.key}`}
          className="flex items-center gap-2 text-sm"
        >
          <input
            id={`${mode}-${field.key}`}
            type="checkbox"
            className="h-4 w-4 rounded border-border"
            checked={Boolean(value)}
            onChange={(event) => setFormValue(mode, field, event.target.checked)}
          />
          {field.label}
        </label>
      );
    }

    return (
      <div key={`${mode}-${field.key}`} className="space-y-2">
        <Label htmlFor={`${mode}-${field.key}`}>{field.label}</Label>
        <Input
          id={`${mode}-${field.key}`}
          type={field.type === "datetime" ? "datetime-local" : field.type}
          required={field.required}
          placeholder={field.placeholder}
          value={String(value ?? "")}
          onChange={(event) => setFormValue(mode, field, event.target.value)}
        />
      </div>
    );
  };

  const renderCoordinateInputs = (mode: LocationMode) => {
    const form = mode === "create" ? createForm : editForm;

    return (
      <div className="grid gap-3 md:grid-cols-2">
        {config.fields
          .filter((field) => field.key === "latitude" || field.key === "longitude")
          .map((field) => (
            <div key={`${mode}-${field.key}`} className="space-y-2">
              <Label htmlFor={`${mode}-${field.key}`}>{field.label}</Label>
              <Input
                id={`${mode}-${field.key}`}
                type="number"
                step="any"
                required={field.required}
                placeholder={field.placeholder}
                value={String(form[field.key] ?? "")}
                onChange={(event) => setFormValue(mode, field, event.target.value)}
              />
            </div>
          ))}
      </div>
    );
  };

  return (
    <section className="space-y-6">
      <Card>
        <CardHeader>
          <CardTitle>{config.title}</CardTitle>
          <CardDescription>{config.description}</CardDescription>
        </CardHeader>
      </Card>

      <div className="grid gap-4 lg:grid-cols-2">
        <Card>
          <CardHeader>
            <CardTitle>Create</CardTitle>
            <CardDescription>
              Klik peta untuk mengisi latitude dan longitude, atau isi manual lewat form di bawah.
            </CardDescription>
          </CardHeader>
          <CardContent className="space-y-4">
            <div className="flex flex-wrap items-center gap-2">
              <Button
                type="button"
                variant="outline"
                onClick={() => requestCurrentLocation("create")}
                disabled={isLocating.create}
              >
                {isLocating.create ? "Mengambil lokasi..." : "Gunakan Lokasi Saya"}
              </Button>
              {locationMessages.create ? (
                <p className="text-sm text-muted-foreground">
                  {locationMessages.create}
                </p>
              ) : null}
            </div>

            <LocationMapPicker
              latitude={createForm.latitude}
              longitude={createForm.longitude}
              onPick={(latitude, longitude) => setCoordinates("create", latitude, longitude)}
            />

            <div className="grid gap-3">
              {renderCoordinateInputs("create")}
              <div className="rounded-lg border border-border bg-muted/20 px-3 py-2 text-sm">
                <p className="font-medium">Alamat dari titik peta</p>
                <p className="mt-1 text-muted-foreground">
                  {isResolvingAddress.create
                    ? "Mencari alamat..."
                    : (resolvedAddress.create ?? "Alamat akan muncul setelah koordinat valid.")}
                </p>
              </div>
              {config.fields
                .filter((field) => field.key !== "latitude" && field.key !== "longitude")
                .map((field) => renderField("create", field))}
            </div>

            <Button onClick={handleCreate} disabled={createMutation.isPending}>
              {createMutation.isPending ? "Menyimpan..." : "Create Data"}
            </Button>
            {createMutation.isError ? (
              <p className="text-sm text-destructive">
                {getApiErrorMessage(createMutation.error)}
              </p>
            ) : null}
          </CardContent>
        </Card>

        <Card>
          <CardHeader>
            <CardTitle>Update</CardTitle>
            <CardDescription>
              Pilih data dari tabel lalu geser titik peta atau edit koordinat secara manual.
            </CardDescription>
          </CardHeader>
          <CardContent className="space-y-4">
            <p className="text-xs text-muted-foreground">
              Editing ID: {editingId ?? "-"}
            </p>

            <div className="flex flex-wrap items-center gap-2">
              <Button
                type="button"
                variant="outline"
                onClick={() => requestCurrentLocation("edit")}
                disabled={isLocating.edit}
              >
                {isLocating.edit ? "Mengambil lokasi..." : "Gunakan Lokasi Saya"}
              </Button>
              {locationMessages.edit ? (
                <p className="text-sm text-muted-foreground">
                  {locationMessages.edit}
                </p>
              ) : null}
            </div>

            <LocationMapPicker
              latitude={editForm.latitude}
              longitude={editForm.longitude}
              onPick={(latitude, longitude) => setCoordinates("edit", latitude, longitude)}
            />

            <div className="grid gap-3">
              {renderCoordinateInputs("edit")}
              <div className="rounded-lg border border-border bg-muted/20 px-3 py-2 text-sm">
                <p className="font-medium">Alamat dari titik peta</p>
                <p className="mt-1 text-muted-foreground">
                  {isResolvingAddress.edit
                    ? "Mencari alamat..."
                    : (resolvedAddress.edit ?? "Alamat akan muncul setelah koordinat valid.")}
                </p>
              </div>
              {config.fields
                .filter((field) => field.key !== "latitude" && field.key !== "longitude")
                .map((field) => renderField("edit", field))}
            </div>

            <div className="flex gap-2">
              <Button
                onClick={handleUpdate}
                disabled={!editingId || updateMutation.isPending}
              >
                {updateMutation.isPending ? "Memperbarui..." : "Update Data"}
              </Button>
              <Button
                variant="outline"
                onClick={() => {
                  setEditingId(null);
                  setEditForm(buildDefaultFormState());
                }}
              >
                Reset
              </Button>
            </div>

            {updateMutation.isError ? (
              <p className="text-sm text-destructive">
                {getApiErrorMessage(updateMutation.error)}
              </p>
            ) : null}
          </CardContent>
        </Card>
      </div>

      <Card>
        <CardHeader>
          <CardTitle>List Data</CardTitle>
          <CardDescription>
            Data asli dari endpoint GET {config.endpoint}
          </CardDescription>
        </CardHeader>
        <CardContent>
          {listQuery.isLoading ? <p>Memuat data...</p> : null}
          {listQuery.isError ? (
            <p className="text-sm text-destructive">
              {getApiErrorMessage(listQuery.error)}
            </p>
          ) : null}

          {listQuery.isSuccess ? (
            <div className="overflow-x-auto">
              <table className="min-w-full border-collapse text-sm">
                <thead>
                  <tr className="border-b border-border text-left">
                    <th className="p-2">ID</th>
                    {config.columns.map((column) => (
                      <th key={column.key} className="p-2">
                        {column.label}
                      </th>
                    ))}
                    <th className="p-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  {rows.map((row) => (
                    <tr key={row.id} className="border-b border-border/60">
                      <td className="max-w-40 truncate p-2 font-mono text-xs">
                        {row.id}
                      </td>
                      {config.columns.map((column) => (
                        <td key={column.key} className="max-w-56 truncate p-2">
                          {String(row[column.key] ?? "-")}
                        </td>
                      ))}
                      <td className="p-2">
                        <div className="flex flex-wrap gap-2">
                          <Button
                            size="xs"
                            variant="outline"
                            onClick={() => handleShow(row.id)}
                          >
                            Detail
                          </Button>
                          <Button
                            size="xs"
                            variant="outline"
                            onClick={() => handleStartEdit(row)}
                          >
                            Edit
                          </Button>
                          <Button
                            size="xs"
                            variant="outline"
                            onClick={() => void handleLoadQr(row)}
                            disabled={isLoadingQrPreview}
                          >
                            QR
                          </Button>
                          <Button
                            size="xs"
                            variant="destructive"
                            onClick={() => handleDelete(row.id)}
                            disabled={deleteMutation.isPending}
                          >
                            Hapus
                          </Button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          ) : null}
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>QR Presensi Lokasi</CardTitle>
          <CardDescription>
            Klik tombol QR pada tabel, lalu print agar siap dipasang di lokasi absensi.
          </CardDescription>
        </CardHeader>
        <CardContent className="space-y-4">
          {isLoadingQrPreview ? (
            <p className="text-sm text-muted-foreground">Menyiapkan QR image...</p>
          ) : null}

          {qrPreviewError ? (
            <p className="text-sm text-destructive">{qrPreviewError}</p>
          ) : null}

          {selectedQrPreview ? (
            <div className="grid gap-4 md:grid-cols-[auto,1fr]">
              <div className="rounded-lg border border-border bg-white p-3">
                <img
                  src={selectedQrPreview.qr_image_data_url}
                  alt={`QR ${selectedQrPreview.name}`}
                  className="h-56 w-56"
                />
              </div>
              <div className="space-y-2 text-sm">
                <p><strong>Nama Lokasi:</strong> {selectedQrPreview.name}</p>
                <p><strong>Status:</strong> {selectedQrPreview.is_active ? "Aktif" : "Nonaktif"}</p>
                <p className="break-all"><strong>Token:</strong> {selectedQrPreview.qr_token}</p>
                <p className="break-all"><strong>Payload:</strong> {selectedQrPreview.qr_payload}</p>

                <div className="flex flex-wrap gap-2 pt-2">
                  <Button type="button" onClick={handlePrintQr}>
                    Print QR
                  </Button>
                  <Button
                    type="button"
                    variant="outline"
                    onClick={() => {
                      void navigator.clipboard.writeText(selectedQrPreview.qr_payload);
                    }}
                  >
                    Copy Payload
                  </Button>
                  <Button
                    type="button"
                    variant="outline"
                    onClick={() => {
                      void navigator.clipboard.writeText(selectedQrPreview.qr_token);
                    }}
                  >
                    Copy Token
                  </Button>
                </div>
              </div>
            </div>
          ) : (
            <p className="text-sm text-muted-foreground">
              Belum ada QR dipilih. Gunakan tombol QR di tabel list data.
            </p>
          )}
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Detail Response</CardTitle>
          <CardDescription>
            Hasil endpoint show ({config.endpoint}/{"{id}"})
          </CardDescription>
        </CardHeader>
        <CardContent>
          <pre className="overflow-x-auto rounded-md border border-border bg-muted/30 p-3 text-xs">
            {prettyJson(
              selectedDetail ?? { message: "Klik tombol Detail pada tabel" },
            )}
          </pre>
          {showMutation.isError ? (
            <p className="mt-2 text-sm text-destructive">
              {getApiErrorMessage(showMutation.error)}
            </p>
          ) : null}
        </CardContent>
      </Card>
    </section>
  );
}

export default AttendanceLocationsPage;
