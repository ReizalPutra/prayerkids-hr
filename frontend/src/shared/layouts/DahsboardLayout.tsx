import { Outlet, useNavigate } from "react-router-dom";
import {
  getApiErrorMessage,
  useLogoutMutation,
  useMeQuery,
} from "@/hooks/useAuth";

function DashboardLayout() {
  const navigate = useNavigate();
  const meQuery = useMeQuery();
  const logoutMutation = useLogoutMutation();

  const handleLogout = async () => {
    await logoutMutation.mutateAsync();
    navigate("/login", { replace: true });
  };

  if (meQuery.isLoading) {
    return <div className="p-6">Memuat data pengguna...</div>;
  }

  if (meQuery.isError) {
    return (
      <div className="p-6">
        <p className="text-sm text-destructive">
          {getApiErrorMessage(meQuery.error)}
        </p>
        <button
          type="button"
          className="mt-3 rounded-md border border-border px-3 py-2 text-sm"
          onClick={() => navigate("/login", { replace: true })}
        >
          Kembali ke Login
        </button>
      </div>
    );
  }

  const user = meQuery.data;
  if (!user) {
    return <div className="p-6">Data pengguna tidak tersedia.</div>;
  }

  return (
    <div className="min-h-screen">
      <header className="flex items-center justify-between border-b border-border px-6 py-4">
        <div>
          <p className="text-sm text-muted-foreground">Login sebagai</p>
          <p className="font-medium">
            {user.name} ({user.role})
          </p>
        </div>
        <button
          type="button"
          className="rounded-md border border-border px-3 py-2 text-sm"
          onClick={handleLogout}
          disabled={logoutMutation.isPending}
        >
          {logoutMutation.isPending ? "Keluar..." : "Logout"}
        </button>
      </header>

      <main className="p-6">
        <Outlet />
      </main>
    </div>
  );
}

export default DashboardLayout;
