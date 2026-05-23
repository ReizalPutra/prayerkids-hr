import { Button } from "@/components/ui/button";
import { Menu, Moon, Sun, X } from "lucide-react";

type DashboardTopbarProps = {
  isDesktop: boolean;
  sidebarExpanded: boolean;
  isDark: boolean;
  onToggleSidebar: () => void;
  onToggleTheme: () => void;
};

function DashboardTopbar({
  isDesktop,
  sidebarExpanded,
  isDark,
  onToggleSidebar,
  onToggleTheme,
}: DashboardTopbarProps) {
  return (
    <header className="flex w-full items-center justify-between border-b border-border bg-background/80 px-6 py-4 backdrop-blur">
      <div className="flex items-center">
        <div className="mr-4">
          <Button
            variant="ghost"
            size="icon"
            onClick={onToggleSidebar}
            aria-label={sidebarExpanded ? "Tutup sidebar" : "Buka sidebar"}
            aria-expanded={sidebarExpanded}
          >
            {sidebarExpanded ? (
              <X className="size-4" />
            ) : (
              <Menu className="size-4" />
            )}
          </Button>
        </div>

        <div>
          <p className="text-sm text-muted-foreground">Selamat datang kembali</p>
          <h1 className="text-xl font-semibold">Sistem HR Prayerkids</h1>
        </div>
      </div>

      <Button type="button" variant="outline" size="sm" onClick={onToggleTheme}>
        {isDark ? <Sun className="size-4" /> : <Moon className="size-4" />}
        {isDark ? "Light" : "Dark"}
      </Button>
    </header>
  );
}

export default DashboardTopbar;