import api from "@/services/api";
import type { ApiResponse } from "@/types";
import type {
  AttendanceRecord,
  AttendanceScanPayload,
  AttendanceScanResult,
} from "../types";

export const attendanceService = {
  async getAll(): Promise<AttendanceRecord[]> {
    const response =
      await api.get<ApiResponse<AttendanceRecord[]>>("/attendances");
    return response.data.data;
  },

  async scan(payload: AttendanceScanPayload): Promise<AttendanceScanResult> {
    const response = await api.post<ApiResponse<AttendanceScanResult>>(
      "/attendances/scan-qr",
      payload,
    );

    return response.data.data;
  },
};
