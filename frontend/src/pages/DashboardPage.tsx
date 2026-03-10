
import { useMeQuery } from "@/hooks/useAuth";

function DashboardPage() {
  const meQuery = useMeQuery();

  return (
    <section>
      <h1 className="text-2xl font-semibold">Dashboard</h1>
      <p className="mt-2 text-sm text-muted-foreground">
        Endpoint backend yang dipakai: <code>/api/me</code>
      </p>

      <div className="mt-4 rounded-lg border border-border p-4">
        <p className="text-sm text-muted-foreground">Status user aktif</p>
        <p className="mt-1 font-medium">{meQuery.data?.name ?? "-"}</p>
      </div>
    </section>
  );
}

export default DashboardPage;