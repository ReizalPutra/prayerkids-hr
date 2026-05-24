import { useMemo } from "react";
import { useResourceListQuery } from "@/hooks/useResourceCrud";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import AttendanceHistory from "../components/AttendanceHistory";
import AttendanceScanner from "../components/AttendanceScanner";
import AttendanceSummary from "../components/AttendanceSummary";
import {
  useAttendanceListQuery,
  useAttendanceScanMutation,
} from "../hooks/useAttendance";
import type { AttendanceRecord, AttendanceShiftOption } from "../types";

const toShiftOptions = (
  items: Record<string, unknown>[],
): AttendanceShiftOption[] =>
  items.map((item) => ({
    id: String(item.id),
    name: String(item.name ?? "-"),
    start_time:
      typeof item.start_time === "string" ? item.start_time : undefined,
    end_time: typeof item.end_time === "string" ? item.end_time : undefined,
  }));

const getRecordValue = (record: AttendanceRecord, key: string) => record[key];

function AttendancePage() {
  const attendancesQuery = useAttendanceListQuery();
  const scanMutation = useAttendanceScanMutation();
  const shiftsQuery = useResourceListQuery("/shifts");

  const shiftOptions = useMemo(
    () => toShiftOptions((shiftsQuery.data ?? []) as Record<string, unknown>[]),
    [shiftsQuery.data],
  );

  const records = (attendancesQuery.data ?? []) as AttendanceRecord[];
  const totalCount = records.length;
  const onTimeCount = records.filter(
    (record) => getRecordValue(record, "status") === "on_time",
  ).length;
  const lateCount = records.filter(
    (record) => getRecordValue(record, "status") === "late",
  ).length;
  const recentCount = records.slice(0, 5).length;

  return (
    <section className="space-y-6">
      <div className="rounded-xl border border-border bg-background p-6">
        <p className="text-sm text-muted-foreground">Attendance Feature</p>
        <h2 className="mt-1 text-2xl font-semibold">Presensi dan Riwayat</h2>
        <p className="mt-2 text-sm text-muted-foreground">
          Halaman ini menggabungkan scan QR presensi, ringkasan data, dan
          riwayat presensi terbaru.
        </p>
      </div>

      <AttendanceSummary
        totalCount={totalCount}
        onTimeCount={onTimeCount}
        lateCount={lateCount}
        recentCount={recentCount}
      />

      <div className="grid gap-6 xl:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]">
        <AttendanceScanner
          shiftOptions={shiftOptions}
          isSubmitting={scanMutation.isPending}
          onSubmit={async (payload) => {
            await scanMutation.mutateAsync(payload);
          }}
        />

        <Card>
          <CardHeader>
            <CardTitle>Status Data</CardTitle>
            <CardDescription>
              Sumber data utama untuk halaman attendance.
            </CardDescription>
          </CardHeader>
          <CardContent className="space-y-3 text-sm text-muted-foreground">
            <p>
              Endpoint daftar presensi:{" "}
              <span className="font-medium text-foreground">/attendances</span>
            </p>
            <p>
              Endpoint scan QR:{" "}
              <span className="font-medium text-foreground">
                /attendances/scan-qr
              </span>
            </p>
            <p>
              Shift options:{" "}
              <span className="font-medium text-foreground">/shifts</span>
            </p>
            <p>
              {attendancesQuery.isLoading || shiftsQuery.isLoading
                ? "Memuat data attendance dan shift..."
                : "Data siap digunakan untuk scan dan monitoring."}
            </p>
          </CardContent>
        </Card>
      </div>

      <AttendanceHistory records={records} />
    </section>
  );
}

export default AttendancePage;
