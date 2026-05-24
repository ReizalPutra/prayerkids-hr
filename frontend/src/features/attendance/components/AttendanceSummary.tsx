import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";

type AttendanceSummaryProps = {
  totalCount: number;
  onTimeCount: number;
  lateCount: number;
  recentCount: number;
};

function AttendanceSummary({
  totalCount,
  onTimeCount,
  lateCount,
  recentCount,
}: AttendanceSummaryProps) {
  return (
    <div className="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
      <Card>
        <CardHeader>
          <CardTitle className="text-sm font-medium">Total Presensi</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-2xl font-semibold">{totalCount}</p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle className="text-sm font-medium">On Time</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-2xl font-semibold">{onTimeCount}</p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle className="text-sm font-medium">Late</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-2xl font-semibold">{lateCount}</p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle className="text-sm font-medium">Entri Terbaru</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-2xl font-semibold">{recentCount}</p>
        </CardContent>
      </Card>
    </div>
  );
}

export default AttendanceSummary;