import { Routes, Route, Navigate } from 'react-router-dom';
import LoginPage from '../pages/LoginPage';
import DashboardPage from '../pages/DashboardPage';
import EmployeePage from '../pages/EmployeePage';
import DashboardLayout from '../shared/layouts/DashboardLayout';
import type { ReactNode } from 'react';

interface ProtectedRouteProps {
  children: ReactNode;
}

const ProtectedRoute = ({ children } : ProtectedRouteProps ) => {
  const token = localStorage.getItem('token');
  if (!token) {
    return <Navigate to="/login" replace />;
  }
  return children;
};

function AppRouter() {
  return (
    <Routes>
      {/* Rute Publik */}
      <Route path="/login" element={<LoginPage />} />

      {/* Rute Terproteksi (Butuh Login) */}
      <Route
        element={
          <ProtectedRoute>
            <DashboardLayout /> {/* Sidebar & Navbar ada di sini */}
          </ProtectedRoute>
        }
      >
        {/* Anak-anak Dashboard */}
        <Route path="/dashboard" element={<DashboardPage />} />
        <Route path="/employees" element={<EmployeePage />} />
        <Route path="/" element={<Navigate to="/dashboard" replace />} />
      </Route>

      {/* Halaman 404 */}
      <Route path="*" element={<h1>Halaman Tidak Ditemukan</h1>} />
    </Routes>
  );
}

export default AppRouter;