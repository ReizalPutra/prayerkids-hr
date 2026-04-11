import { useMeQuery } from "@/hooks/useAuth";
import { useDivisionsQuery } from "@/hooks/useDivisions";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Separator } from "@/components/ui/separator";
import { Building2, Users, ShieldCheck, ArrowRight } from "lucide-react";
import { Link } from "react-router-dom";

function DashboardPage() {
  const meQuery = useMeQuery();
  const divisionsQuery = useDivisionsQuery();

  const totalDivisions = divisionsQuery.data?.length ?? 0;

  return (
    <section className="space-y-6">
      <div className="rounded-xl border border-border bg-background p-6">
        <p className="text-sm text-muted-foreground">Overview Dashboard</p>
        <h2 className="mt-1 text-2xl font-semibold">Ringkasan Sistem HR</h2>
        <p className="mt-2 text-sm text-muted-foreground">
          Data ditarik dari endpoint backend seperti /api/me dan /api/divisions.
        </p>
      </div>

      <div className="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <Card>
          <CardHeader className="flex flex-row items-center justify-between space-y-0">
            <CardTitle className="text-sm font-medium">Pengguna Aktif</CardTitle>
            <Users className="size-4 text-muted-foreground" />
          </CardHeader>
          <CardContent>
            <p className="text-xl font-semibold">{meQuery.data?.name ?? "-"}</p>
            <p className="text-xs text-muted-foreground">Role: {meQuery.data?.role ?? "-"}</p>
          </CardContent>
        </Card>

        <Card>
          <CardHeader className="flex flex-row items-center justify-between space-y-0">
            <CardTitle className="text-sm font-medium">Total Divisi</CardTitle>
            <Building2 className="size-4 text-muted-foreground" />
          </CardHeader>
          <CardContent>
            <p className="text-xl font-semibold">{divisionsQuery.isSuccess ? totalDivisions : "-"}</p>
            <p className="text-xs text-muted-foreground">
              {divisionsQuery.isLoading ? "Memuat data..." : "Sumber: /api/divisions"}
            </p>
          </CardContent>
        </Card>

        <Card>
          <CardHeader className="flex flex-row items-center justify-between space-y-0">
            <CardTitle className="text-sm font-medium">Status Auth</CardTitle>
            <ShieldCheck className="size-4 text-muted-foreground" />
          </CardHeader>
          <CardContent>
            <p className="text-xl font-semibold">{meQuery.isSuccess ? "Valid" : "Unknown"}</p>
            <p className="text-xs text-muted-foreground">Token Bearer tersimpan di browser</p>
          </CardContent>
        </Card>

        <Card>
          <CardHeader className="flex flex-row items-center justify-between space-y-0">
            <CardTitle className="text-sm font-medium">Status API</CardTitle>
            <ArrowRight className="size-4 text-muted-foreground" />
          </CardHeader>
          <CardContent>
            <p className="text-xl font-semibold">{meQuery.isError || divisionsQuery.isError ? "Perlu cek" : "Sehat"}</p>
            <p className="text-xs text-muted-foreground">Monitoring sederhana endpoint utama</p>
          </CardContent>
        </Card>
      </div>

      <div className="grid gap-4 lg:grid-cols-2">
        <Card>
          <CardHeader>
            <CardTitle>Aksi Cepat</CardTitle>
            <CardDescription>Navigasi ke area yang sering dipakai admin.</CardDescription>
          </CardHeader>
          <CardContent className="space-y-3">
            <Button asChild className="w-full justify-between">
              <Link to="/employees">
                Kelola Data Employee
                <ArrowRight className="size-4" />
              </Link>
            </Button>
            <Button asChild variant="outline" className="w-full justify-between">
              <a href="http://localhost:8000/docs" target="_blank" rel="noreferrer">
                Buka API Docs (Scribe)
                <ArrowRight className="size-4" />
              </a>
            </Button>
          </CardContent>
        </Card>

        <Card>
          <CardHeader>
            <CardTitle>Info Integrasi</CardTitle>
            <CardDescription>Ringkasan endpoint yang sedang dipakai frontend.</CardDescription>
          </CardHeader>
          <CardContent className="space-y-3">
            <div>
              <p className="text-xs text-muted-foreground">Endpoint Auth</p>
              <p className="text-sm font-medium">/api/me</p>
            </div>
            <Separator />
            <div>
              <p className="text-xs text-muted-foreground">Endpoint Resource</p>
              <p className="text-sm font-medium">/api/divisions</p>
            </div>
            <Separator />
            <div>
              <p className="text-xs text-muted-foreground">Mode Dashboard</p>
              <p className="text-sm font-medium">Shadcn UI + Tailwind CSS</p>
            </div>
          </CardContent>
        </Card>
      </div>
    </section>
  );
}

export default DashboardPage;
