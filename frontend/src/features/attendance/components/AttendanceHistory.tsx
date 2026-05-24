import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import type { AttendanceRecord } from "../types";

type AttendanceHistoryProps = {
  records: AttendanceRecord[];
};

const getFieldText = (value: unknown) => {
  if (typeof value === "string" && value.trim().length > 0) {
    return value;
  }

  if (typeof value === "number") {
    return String(value);
  }

  return "-";
};

function AttendanceHistory({ records }: AttendanceHistoryProps) {
  return (
    <Card>
      <CardHeader>
        <CardTitle>Riwayat Presensi</CardTitle>
      </CardHeader>
      <CardContent>
        <div className="space-y-3">
          {records.length === 0 ? (
            <p className="text-sm text-muted-foreground">
              Belum ada data presensi yang ditampilkan.
            </p>
          ) : (
            records.slice(0, 10).map((record) => (
              <div
                key={record.id}
                className="rounded-lg border border-border bg-muted/20 p-4"
              >
                <div className="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                  <div>
                    <p className="font-medium">
                      {getFieldText(record.employee_name)}
                    </p>
                    <p className="text-xs text-muted-foreground">
                      {getFieldText(record.employee_nik)}
                    </p>
                  </div>
                  <p className="text-sm text-muted-foreground">
                    {getFieldText(record.date)}
                  </p>
                </div>

                <div className="mt-3 grid gap-3 text-sm sm:grid-cols-3">
                  <div>
                    <p className="text-xs text-muted-foreground">Status</p>
                    <p className="font-medium">{getFieldText(record.status)}</p>
                  </div>
                  <div>
                    <p className="text-xs text-muted-foreground">Clock In</p>
                    <p className="font-medium">
                      {getFieldText(record.clock_in)}
                    </p>
                  </div>
                  <div>
                    <p className="text-xs text-muted-foreground">Clock Out</p>
                    <p className="font-medium">
                      {getFieldText(record.clock_out)}
                    </p>
                  </div>
                </div>
              </div>
            ))
          )}
        </div>
      </CardContent>
    </Card>
  );
}

export default AttendanceHistory;
