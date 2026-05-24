import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query";
import { attendanceService } from "../services/attendance-service";
import type { AttendanceScanPayload } from "../types";

export const attendanceKeys = {
  all: ["attendance"] as const,
  list: () => [...attendanceKeys.all, "list"] as const,
};

export const useAttendanceListQuery = () =>
  useQuery({
    queryKey: attendanceKeys.list(),
    queryFn: attendanceService.getAll,
  });

export const useAttendanceScanMutation = () => {
  const queryClient = useQueryClient();

  return useMutation({
    mutationFn: (payload: AttendanceScanPayload) => attendanceService.scan(payload),
    onSuccess: async () => {
      await queryClient.invalidateQueries({ queryKey: attendanceKeys.list() });
    },
  });
};