# Attendance Feature

This folder contains the attendance workflow.

## Implemented Pieces

- `pages/AttendancePage.tsx`: main attendance screen.
- `components/AttendanceScanner.tsx`: QR token + shift + geolocation form.
- `components/AttendanceSummary.tsx`: quick summary cards.
- `components/AttendanceHistory.tsx`: recent attendance records.
- `hooks/useAttendance.ts`: attendance list and scan mutation.
- `services/attendance-service.ts`: API calls for `/attendances` and `/attendances/scan-qr`.

## Current Flow

1. Load shift options from `/shifts`.
2. Load attendance history from `/attendances`.
3. Submit a scan payload to `/attendances/scan-qr`.
4. Refresh the attendance list after a successful scan.

## Folder Shape

```text
src/features/attendance/
  pages/
  components/
  hooks/
  services/
  types/
  utils/
```

## Next Step

If the backend later adds richer analytics endpoints, extend the summary cards and history filters here before moving logic back to shared pages.
