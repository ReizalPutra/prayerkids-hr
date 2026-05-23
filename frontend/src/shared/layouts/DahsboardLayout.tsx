import { useEffect, useState } from "react";
import { Outlet, useLocation, useNavigate } from "react-router-dom";
import {
  getApiErrorMessage,
  useLogoutMutation,
  useMeQuery,
} from "@/hooks/useAuth";
import { Button } from "@/components/ui/button";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import DashboardSidebar from "./dashboard/DashboardSidebar";
import DashboardTopbar from "./dashboard/DashboardTopbar";

function DashboardLayout() {
  const navigate = useNavigate();
  const location = useLocation();
  const meQuery = useMeQuery();
  const logoutMutation = useLogoutMutation();
  const [isDesktop, setIsDesktop] = useState(() => {
    if (typeof window === "undefined") {
      return true;
    }

    return window.matchMedia("(min-width: 1024px)").matches;
  });
  const [sidebarOpen, setSidebarOpen] = useState(false);
  const [sidebarCollapsed, setSidebarCollapsed] = useState(false);
  const [isDark, setIsDark] = useState(() => {
    const storedTheme = localStorage.getItem("theme");
    const prefersDark = window.matchMedia(
      "(prefers-color-scheme: dark)",
    ).matches;
    return storedTheme ? storedTheme === "dark" : prefersDark;
  });

  useEffect(() => {
    const root = document.documentElement;
    root.classList.toggle("dark", isDark);
  }, [isDark]);

  useEffect(() => {
    const mediaQuery = window.matchMedia("(min-width: 1024px)");

    const updateViewport = () => {
      setIsDesktop(mediaQuery.matches);
    };

    updateViewport();
    mediaQuery.addEventListener("change", updateViewport);

    return () => mediaQuery.removeEventListener("change", updateViewport);
  }, []);

  useEffect(() => {
    if (isDesktop) {
      return;
    }

    setSidebarOpen(false);
  }, [isDesktop, location.pathname]);

  const toggleSidebar = () => {
    if (isDesktop) {
      setSidebarCollapsed((current) => !current);
      return;
    }

    setSidebarOpen((current) => !current);
  };

  const toggleTheme = () => {
    const root = document.documentElement;
    const next = !isDark;
    root.classList.toggle("dark", next);
    localStorage.setItem("theme", next ? "dark" : "light");
    setIsDark(next);
  };

  const handleLogout = async () => {
    await logoutMutation.mutateAsync();
    navigate("/login", { replace: true });
  };

  if (meQuery.isLoading) {
    return (
      <div className="min-h-screen bg-muted/30 p-6">
        <Card className="mx-auto max-w-xl">
          <CardHeader>
            <CardTitle>Memuat Dashboard</CardTitle>
            <CardDescription>
              Sedang mengambil data pengguna aktif.
            </CardDescription>
          </CardHeader>
          <CardContent>
            <p className="text-sm text-muted-foreground">
              Mohon tunggu sebentar...
            </p>
          </CardContent>
        </Card>
      </div>
    );
  }

  if (meQuery.isError) {
    return (
      <div className="min-h-screen bg-muted/30 p-6">
        <Card className="mx-auto max-w-xl border-destructive/30">
          <CardHeader>
            <CardTitle>Gagal Memuat Dashboard</CardTitle>
            <CardDescription className="text-destructive">
              {getApiErrorMessage(meQuery.error)}
            </CardDescription>
          </CardHeader>
          <CardContent>
            <Button
              variant="outline"
              onClick={() => navigate("/login", { replace: true })}
            >
              Kembali ke Login
            </Button>
          </CardContent>
        </Card>
      </div>
    );
  }

  const user = meQuery.data;
  if (!user) {
    return (
      <div className="min-h-screen bg-muted/30 p-6">
        <Card className="mx-auto max-w-xl">
          <CardHeader>
            <CardTitle>Data Tidak Tersedia</CardTitle>
            <CardDescription>Profil pengguna tidak ditemukan.</CardDescription>
          </CardHeader>
        </Card>
      </div>
    );
  }

  const isEmployee = user.role === "employee";
  const sidebarExpanded = isDesktop ? !sidebarCollapsed : sidebarOpen;

  return (
    <div className="min-h-screen bg-muted/30">
      <DashboardSidebar
        isDesktop={isDesktop}
        sidebarExpanded={sidebarExpanded}
        isEmployee={isEmployee}
        userName={user.name}
        userRole={user.role}
        logoutPending={logoutMutation.isPending}
        onLogout={handleLogout}
      />

      {sidebarOpen ? (
        <div
          className="fixed inset-0 z-30 bg-black/40 lg:hidden"
          onClick={() => setSidebarOpen(false)}
          aria-hidden
        />
      ) : null}

      <div
        className={
          "min-h-screen w-full transition-[padding] duration-200 " +
          (isDesktop ? (sidebarCollapsed ? "lg:pl-20" : "lg:pl-64") : "lg:pl-0")
        }
      >
        <DashboardTopbar
          isDesktop={isDesktop}
          sidebarExpanded={sidebarExpanded}
          isDark={isDark}
          onToggleSidebar={toggleSidebar}
          onToggleTheme={toggleTheme}
        />

        <main className="min-h-[calc(100vh-73px)] w-full p-6">
          <Outlet />
        </main>
      </div>
    </div>
  );
}

export default DashboardLayout;
