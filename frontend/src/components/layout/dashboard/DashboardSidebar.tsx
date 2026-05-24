import { NavLink } from "react-router-dom";
import { Button } from "@/components/ui/button";
import { Separator } from "@/components/ui/separator";
import { LayoutDashboard, Users, LogOut, Shield, Layers3 } from "lucide-react";
import { resourceConfigs } from "@/features/resources/resource-config";
import { toKebabCase } from "./dashboard-layout-utils";

type DashboardSidebarProps = {
  isDesktop: boolean;
  sidebarExpanded: boolean;
  isEmployee: boolean;
  userName: string;
  userRole: string;
  logoutPending: boolean;
  onLogout: () => void;
};

function DashboardSidebar({
  isDesktop,
  sidebarExpanded,
  isEmployee,
  userName,
  userRole,
  logoutPending,
  onLogout,
}: DashboardSidebarProps) {
  const iconButtonClass = sidebarExpanded
    ? "w-full justify-start gap-2"
    : "mx-auto flex h-10 w-10 items-center justify-center px-0";

  return (
    <aside
      className={
        "fixed inset-y-0 left-0 z-40 border-r border-border bg-background/95 p-4 backdrop-blur transition-all duration-200 " +
        (isDesktop
          ? sidebarExpanded
            ? "w-64"
            : "w-20"
          : sidebarExpanded
            ? "w-64 translate-x-0 shadow-xl"
            : "w-64 -translate-x-full")
      }
      aria-hidden={!sidebarExpanded && !isDesktop}
    >
      <div
        className={
          sidebarExpanded
            ? "flex items-center justify-between"
            : "flex items-center justify-start"
        }
      >
        <div>
          <p
            className={
              sidebarExpanded
                ? "text-xs uppercase tracking-wide text-muted-foreground"
                : "sr-only"
            }
          >
            Prayerkids HR
          </p>
        </div>
      </div>

      <div
        className={
          "mb-4 mt-3 rounded-lg border border-border bg-background p-4 " +
          (sidebarExpanded ? "lg:mt-0" : "hidden lg:block lg:p-3")
        }
      >
        <p
          className={
            sidebarExpanded
              ? "text-xs uppercase tracking-wide text-muted-foreground"
              : "sr-only"
          }
        >
          Prayerkids HR
        </p>
        <h2
          className={sidebarExpanded ? "mt-1 text-lg font-semibold" : "sr-only"}
        >
          {isEmployee ? "Employee Panel" : "Admin Panel"}
        </h2>
        <p
          className={
            sidebarExpanded ? "mt-2 text-sm text-muted-foreground" : "sr-only"
          }
        >
          {userName} ({userRole})
        </p>
      </div>

      <nav className="space-y-2">
        <Button
          asChild
          variant="ghost"
          className={iconButtonClass}
          title="Dashboard"
        >
          <NavLink to="/dashboard">
            <LayoutDashboard className="size-4" />
            <span className={sidebarExpanded ? "" : "sr-only"}>Dashboard</span>
          </NavLink>
        </Button>

        <Button
          asChild
          variant="ghost"
          className={iconButtonClass}
          title="Scan Presensi"
        >
          <NavLink to="/employees">
            <Users className="size-4" />
            <span className={sidebarExpanded ? "" : "sr-only"}>
              Scan Presensi
            </span>
          </NavLink>
        </Button>

        {!isEmployee ? (
          <>
            {sidebarExpanded ? (
              <Separator className="my-2" />
            ) : (
              <Separator className="my-2 lg:hidden" />
            )}

            {resourceConfigs.map((resource) => (
              <Button
                key={resource.key}
                asChild
                variant="ghost"
                className={iconButtonClass}
                title={resource.title}
              >
                <NavLink to={`/dashboard/${toKebabCase(resource.key)}`}>
                  <Layers3 className="size-4" />
                  <span className={sidebarExpanded ? "" : "sr-only"}>
                    {resource.title}
                  </span>
                </NavLink>
              </Button>
            ))}

            {userRole === "admin" ? (
              <Button
                asChild
                variant="ghost"
                className={iconButtonClass}
                title="User Management"
              >
                <NavLink to="/dashboard/user-management">
                  <Shield className="size-4" />
                  <span className={sidebarExpanded ? "" : "sr-only"}>
                    User Management
                  </span>
                </NavLink>
              </Button>
            ) : null}
          </>
        ) : null}
      </nav>

      <Separator className="my-4" />

      <Button
        type="button"
        variant="outline"
        className={iconButtonClass}
        onClick={onLogout}
        disabled={logoutPending}
        title="Logout"
      >
        <LogOut className="size-4" />
        <span className={sidebarExpanded ? "" : "sr-only"}>
          {logoutPending ? "Keluar..." : "Logout"}
        </span>
      </Button>
    </aside>
  );
}

export default DashboardSidebar;
