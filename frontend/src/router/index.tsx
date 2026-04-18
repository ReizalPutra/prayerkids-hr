import { Routes, Route, Navigate } from "react-router-dom";
import LoginPage from "../pages/LoginPage";
import DashboardLayout from "../shared/layouts/DahsboardLayout";
import { lazy, Suspense, type ReactNode } from "react";
import { useMeQuery } from "@/hooks/useAuth";
import type { User } from "@/types";

const DashboardPage = lazy(() => import("../pages/DashboardPage"));
const EmployeePage = lazy(() => import("../pages/EmployeePage"));
const DivisionsPage = lazy(() => import("../pages/dashboard/DivisionsPage"));
const PositionsPage = lazy(() => import("../pages/dashboard/PositionsPage"));
const ShiftsPage = lazy(() => import("../pages/dashboard/ShiftsPage"));
const AttendanceLocationsPage = lazy(
  () => import("../pages/dashboard/AttendanceLocationsPage"),
);
const ContractTemplatesPage = lazy(
  () => import("../pages/dashboard/ContractTemplatesPage"),
);
const EmployeesPage = lazy(() => import("../pages/dashboard/EmployeesPage"));
const AttendancesPage = lazy(
  () => import("../pages/dashboard/AttendancesPage"),
);
const LeaveRequestsPage = lazy(
  () => import("../pages/dashboard/LeaveRequestsPage"),
);
const PayrollsPage = lazy(() => import("../pages/dashboard/PayrollsPage"));
const PerformanceReviewsPage = lazy(
  () => import("../pages/dashboard/PerformanceReviewsPage"),
);
const JobVacanciesPage = lazy(
  () => import("../pages/dashboard/JobVacanciesPage"),
);
const ApplicantsPage = lazy(() => import("../pages/dashboard/ApplicantsPage"));

interface ProtectedRouteProps {
  children: ReactNode;
}

const ProtectedRoute = ({ children }: ProtectedRouteProps) => {
  const token = localStorage.getItem("token");
  if (!token) {
    return <Navigate to="/login" replace />;
  }
  return children;
};

const PublicRoute = ({ children }: ProtectedRouteProps) => {
  const token = localStorage.getItem("token");
  if (token) {
    return <Navigate to="/" replace />;
  }
  return children;
};

const LoadingGuard = () => (
  <div className="p-6 text-sm text-muted-foreground">
    Memuat akses pengguna...
  </div>
);

const RouteSuspense = ({ children }: { children: ReactNode }) => (
  <Suspense fallback={<LoadingGuard />}>{children}</Suspense>
);

const RoleGuard = ({
  children,
  allowedRoles,
  fallback,
}: {
  children: ReactNode;
  allowedRoles: User["role"][];
  fallback: string;
}) => {
  const meQuery = useMeQuery();

  if (meQuery.isLoading) {
    return <LoadingGuard />;
  }

  if (meQuery.isError || !meQuery.data) {
    localStorage.removeItem("token");
    return <Navigate to="/login" replace />;
  }

  if (!allowedRoles.includes(meQuery.data.role)) {
    return <Navigate to={fallback} replace />;
  }

  return children;
};

const RoleLandingRoute = () => {
  return <Navigate to="/dashboard" replace />;
};

function AppRouter() {
  return (
    <Routes>
      {/* Rute Publik */}
      <Route
        path="/login"
        element={
          <PublicRoute>
            <LoginPage />
          </PublicRoute>
        }
      />

      {/* Rute Terproteksi (Butuh Login) */}
      <Route
        element={
          <ProtectedRoute>
            <DashboardLayout /> {/* Sidebar & Navbar ada di sini */}
          </ProtectedRoute>
        }
      >
        {/* Anak-anak Dashboard */}
        <Route
          path="/dashboard"
          element={
            <RouteSuspense>
              <DashboardPage />
            </RouteSuspense>
          }
        />
        <Route
          path="/employees"
          element={
            <RoleGuard allowedRoles={["employee"]} fallback="/dashboard">
              <RouteSuspense>
                <EmployeePage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/divisions"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <DivisionsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/positions"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <PositionsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/shifts"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <ShiftsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/attendance-locations"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <AttendanceLocationsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/contract-templates"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <ContractTemplatesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/employees"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <EmployeesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/attendances"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <AttendancesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/leave-requests"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <LeaveRequestsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/payrolls"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <PayrollsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/performance-reviews"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <PerformanceReviewsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/job-vacancies"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <JobVacanciesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/dashboard/applicants"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <ApplicantsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route path="/dashboard/attendanceLocations" element={<Navigate to="/dashboard/attendance-locations" replace />} />
        <Route path="/dashboard/contractTemplates" element={<Navigate to="/dashboard/contract-templates" replace />} />
        <Route path="/dashboard/leaveRequests" element={<Navigate to="/dashboard/leave-requests" replace />} />
        <Route path="/dashboard/performanceReviews" element={<Navigate to="/dashboard/performance-reviews" replace />} />
        <Route path="/dashboard/jobVacancies" element={<Navigate to="/dashboard/job-vacancies" replace />} />

        <Route path="/resources/divisions" element={<Navigate to="/dashboard/divisions" replace />} />
        <Route path="/resources/positions" element={<Navigate to="/dashboard/positions" replace />} />
        <Route path="/resources/shifts" element={<Navigate to="/dashboard/shifts" replace />} />
        <Route path="/resources/attendanceLocations" element={<Navigate to="/dashboard/attendance-locations" replace />} />
        <Route path="/resources/attendance-locations" element={<Navigate to="/dashboard/attendance-locations" replace />} />
        <Route path="/resources/contractTemplates" element={<Navigate to="/dashboard/contract-templates" replace />} />
        <Route path="/resources/contract-templates" element={<Navigate to="/dashboard/contract-templates" replace />} />
        <Route path="/resources/employees" element={<Navigate to="/dashboard/employees" replace />} />
        <Route path="/resources/attendances" element={<Navigate to="/dashboard/attendances" replace />} />
        <Route path="/resources/leaveRequests" element={<Navigate to="/dashboard/leave-requests" replace />} />
        <Route path="/resources/leave-requests" element={<Navigate to="/dashboard/leave-requests" replace />} />
        <Route path="/resources/payrolls" element={<Navigate to="/dashboard/payrolls" replace />} />
        <Route path="/resources/performanceReviews" element={<Navigate to="/dashboard/performance-reviews" replace />} />
        <Route path="/resources/performance-reviews" element={<Navigate to="/dashboard/performance-reviews" replace />} />
        <Route path="/resources/jobVacancies" element={<Navigate to="/dashboard/job-vacancies" replace />} />
        <Route path="/resources/job-vacancies" element={<Navigate to="/dashboard/job-vacancies" replace />} />
        <Route path="/resources/applicants" element={<Navigate to="/dashboard/applicants" replace />} />
      </Route>

      <Route
        path="/"
        element={
          <ProtectedRoute>
            <RoleLandingRoute />
          </ProtectedRoute>
        }
      />

      {/* Halaman 404 */}
      <Route path="*" element={<h1>Halaman Tidak Ditemukan</h1>} />
    </Routes>
  );
}

export default AppRouter;
