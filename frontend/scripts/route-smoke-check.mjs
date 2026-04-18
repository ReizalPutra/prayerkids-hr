import fs from "node:fs";
import path from "node:path";

const root = process.cwd();
const routerPath = path.join(root, "src", "router", "index.tsx");
const layoutPath = path.join(root, "src", "shared", "layouts", "DahsboardLayout.tsx");

const routerContent = fs.readFileSync(routerPath, "utf8");
const layoutContent = fs.readFileSync(layoutPath, "utf8");

const requiredDashboardRoutes = [
  "/dashboard/divisions",
  "/dashboard/positions",
  "/dashboard/shifts",
  "/dashboard/attendance-locations",
  "/dashboard/contract-templates",
  "/dashboard/employees",
  "/dashboard/attendances",
  "/dashboard/leave-requests",
  "/dashboard/payrolls",
  "/dashboard/performance-reviews",
  "/dashboard/job-vacancies",
  "/dashboard/applicants",
];

const requiredLegacyRoutes = [
  "/resources/divisions",
  "/resources/positions",
  "/resources/shifts",
  "/resources/attendanceLocations",
  "/resources/attendance-locations",
  "/resources/contractTemplates",
  "/resources/contract-templates",
  "/resources/employees",
  "/resources/attendances",
  "/resources/leaveRequests",
  "/resources/leave-requests",
  "/resources/payrolls",
  "/resources/performanceReviews",
  "/resources/performance-reviews",
  "/resources/jobVacancies",
  "/resources/job-vacancies",
  "/resources/applicants",
];

const requiredDashboardLegacyRedirects = [
  "/dashboard/attendanceLocations",
  "/dashboard/contractTemplates",
  "/dashboard/leaveRequests",
  "/dashboard/performanceReviews",
  "/dashboard/jobVacancies",
];

const missingDashboardRoutes = requiredDashboardRoutes.filter(
  (route) => !routerContent.includes(`path=\"${route}\"`),
);

const missingLegacyRoutes = requiredLegacyRoutes.filter(
  (route) => !routerContent.includes(`path=\"${route}\"`),
);

const missingDashboardLegacyRoutes = requiredDashboardLegacyRedirects.filter(
  (route) => !routerContent.includes(`path=\"${route}\"`),
);

const sidebarUsesDashboardBase = layoutContent.includes(
  "to={`/dashboard/${toKebabCase(resource.key)}`}",
);

const failures = [];

if (missingDashboardRoutes.length > 0) {
  failures.push(
    `Missing dashboard routes: ${missingDashboardRoutes.join(", ")}`,
  );
}

if (missingLegacyRoutes.length > 0) {
  failures.push(`Missing /resources redirects: ${missingLegacyRoutes.join(", ")}`);
}

if (missingDashboardLegacyRoutes.length > 0) {
  failures.push(
    `Missing camelCase dashboard redirects: ${missingDashboardLegacyRoutes.join(", ")}`,
  );
}

if (!sidebarUsesDashboardBase) {
  failures.push("Sidebar links are not using /dashboard/<resource> path mapping.");
}

if (failures.length > 0) {
  console.error("Route smoke check failed:");
  failures.forEach((failure) => console.error(`- ${failure}`));
  process.exit(1);
}

console.log("Route smoke check passed.");
