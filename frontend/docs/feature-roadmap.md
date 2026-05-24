# Feature Roadmap

This roadmap turns the feature-based structure into a concrete build plan.

## 1. Dashboard

Status: in progress.

Build out the existing dashboard feature with:
- richer KPI cards,
- recent activity widgets,
- quick actions by role,
- empty/loading/error states for each dashboard block.

## 2. Attendance

Target folder: `src/features/attendance`.

Status: implemented as an initial full slice.

Implemented pieces:
- `pages/AttendancePage.tsx` for attendance history and status,
- `components/AttendanceScanner.tsx` for QR scan flow,
- `components/AttendanceSummary.tsx` for today/week metrics,
- `hooks/useAttendance.ts` for attendance-specific queries and mutations,
- `services/attendance-service.ts` for API calls.

Remaining improvements:
- scanner camera flow,
- attendance filters,
- richer status badges,
- detail drawer or modal for a single attendance record.

## 3. Employees

Target folder: `src/features/employees`.

Status: implemented as an initial CRUD slice.

Implemented pieces:
- employee list via shared CRUD view,
- create, update, delete, and detail actions,
- division and position relation selectors,
- dashboard route bridge.

Remaining improvements:
- search and filtering,
- profile drawer or detail panel,
- onboarding and status workflows,
- contract assignment helpers.

## 4. Payroll

Target folder: `src/features/payroll`.

Planned pieces:
- payroll period list,
- payroll detail screen,
- payslip preview/download,
- payroll approval or processing actions.

## 5. Auth

Target folder: `src/features/auth`.

Planned pieces:
- login flow,
- forgot-password flow if supported by backend,
- session cleanup helpers,
- auth state utilities.

## Build Order

1. Employees polish.
2. Payroll.
3. Auth polish.
4. Dashboard polish.

## Delivery Rule

For each feature:
- keep page composition in `pages/`,
- keep domain data and API calls in `hooks/` or `services/`,
- keep reusable feature UI in `components/`,
- add a short README once the feature has more than one moving part.
