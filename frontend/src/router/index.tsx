import { Routes, Route, Navigate } from "react-router-dom";
import LoginPage from "../pages/LoginPage";
import DashboardLayout from "../shared/layouts/DahsboardLayout";
import { lazy, Suspense, type ReactNode } from "react";
import { useMeQuery } from "@/hooks/useAuth";
import type { User } from "@/types";

const DashboardPage = lazy(() => import("../pages/DashboardPage"));
const EmployeePage = lazy(() => import("../pages/EmployeePage"));
const DivisionsPage = lazy(() => import("../pages/resources/DivisionsPage"));
const PositionsPage = lazy(() => import("../pages/resources/PositionsPage"));
const ShiftsPage = lazy(() => import("../pages/resources/ShiftsPage"));
const AttendanceLocationsPage = lazy(
  () => import("../pages/resources/AttendanceLocationsPage"),
);
const ContractTemplatesPage = lazy(
  () => import("../pages/resources/ContractTemplatesPage"),
);
const EmployeesPage = lazy(() => import("../pages/resources/EmployeesPage"));
const AttendancesPage = lazy(() => import("../pages/resources/AttendancesPage"));
const LeaveRequestsPage = lazy(() => import("../pages/resources/LeaveRequestsPage"));
const PayrollsPage = lazy(() => import("../pages/resources/PayrollsPage"));
const PerformanceReviewsPage = lazy(
  () => import("../pages/resources/PerformanceReviewsPage"),
);
const JobVacanciesPage = lazy(() => import("../pages/resources/JobVacanciesPage"));
const ApplicantsPage = lazy(() => import("../pages/resources/ApplicantsPage"));

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
  <div className="p-6 text-sm text-muted-foreground">Memuat akses pengguna...</div>
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
          path="/resources/divisions"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <DivisionsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/positions"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <PositionsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/shifts"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <ShiftsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/attendanceLocations"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <AttendanceLocationsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/contractTemplates"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <ContractTemplatesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/employees"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <EmployeesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/attendances"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <AttendancesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/leaveRequests"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <LeaveRequestsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/payrolls"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <PayrollsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/performanceReviews"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <PerformanceReviewsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/jobVacancies"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <JobVacanciesPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
        <Route
          path="/resources/applicants"
          element={
            <RoleGuard allowedRoles={["admin", "hr"]} fallback="/employees">
              <RouteSuspense>
                <ApplicantsPage />
              </RouteSuspense>
            </RoleGuard>
          }
        />
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
