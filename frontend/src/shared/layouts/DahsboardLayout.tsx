import { Outlet, NavLink, useNavigate } from "react-router-dom";
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
import { Separator } from "@/components/ui/separator";
import { LayoutDashboard, Users, LogOut } from "lucide-react";

function DashboardLayout() {
  const navigate = useNavigate();
  const meQuery = useMeQuery();
  const logoutMutation = useLogoutMutation();

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
            <CardDescription>Sedang mengambil data pengguna aktif.</CardDescription>
          </CardHeader>
          <CardContent>
            <p className="text-sm text-muted-foreground">Mohon tunggu sebentar...</p>
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
            <Button variant="outline" onClick={() => navigate("/login", { replace: true })}>
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

  return (
    <div className="min-h-screen bg-muted/30">
      <div className="mx-auto grid min-h-screen max-w-7xl grid-cols-1 lg:grid-cols-[260px_1fr]">
        <aside className="border-b border-border bg-background/80 p-4 backdrop-blur lg:border-r lg:border-b-0">
          <div className="mb-4 rounded-lg border border-border bg-background p-4">
            <p className="text-xs uppercase tracking-wide text-muted-foreground">Prayerkids HR</p>
            <h2 className="mt-1 text-lg font-semibold">Admin Panel</h2>
            <p className="mt-2 text-sm text-muted-foreground">
              {user.name} ({user.role})
            </p>
          </div>

          <nav className="space-y-2">
            <Button asChild variant="ghost" className="w-full justify-start gap-2">
              <NavLink to="/dashboard">
                <LayoutDashboard className="size-4" />
                Dashboard
              </NavLink>
            </Button>
            <Button asChild variant="ghost" className="w-full justify-start gap-2">
              <NavLink to="/employees">
                <Users className="size-4" />
                Employees
              </NavLink>
            </Button>
          </nav>

          <Separator className="my-4" />

          <Button
            type="button"
            variant="outline"
            className="w-full justify-start gap-2"
            onClick={handleLogout}
            disabled={logoutMutation.isPending}
          >
            <LogOut className="size-4" />
            {logoutMutation.isPending ? "Keluar..." : "Logout"}
          </Button>
        </aside>

        <div className="flex min-h-screen flex-col">
          <header className="border-b border-border bg-background/80 px-6 py-4 backdrop-blur">
            <p className="text-sm text-muted-foreground">Selamat datang kembali</p>
            <h1 className="text-xl font-semibold">Sistem HR Prayerkids</h1>
          </header>

          <main className="flex-1 p-6">
            <Outlet />
          </main>
        </div>
      </div>
    </div>
  );
}

export default DashboardLayout;
