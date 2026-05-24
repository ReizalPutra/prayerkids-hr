export type AttendanceRecord = Record<string, unknown> & {
  id: string;
  status?: string;
  date?: string;
  clock_in?: string;
  clock_out?: string | null;
  late_minutes?: number | null;
  employee_name?: string;
  employee_nik?: string;
};

export type AttendanceScanPayload = {
  qr_token: string;
  shift_id: string;
  check_in_lat: number;
  check_in_long: number;
};

export type AttendanceScanResult = {
  id: string;
  status: "on_time" | "late";
  late_minutes: number;
  date: string;
  clock_in: string;
};

export type AttendanceShiftOption = {
  id: string;
  name: string;
  start_time?: string;
  end_time?: string;
};
