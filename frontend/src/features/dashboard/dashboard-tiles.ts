import {
  Users,
  Building2,
  Clock,
  ClipboardList,
  Briefcase,
  FileText,
  DollarSign,
  Activity,
} from "lucide-react";
import type { ComponentType, SVGProps } from 'react';

export type DashboardRole = "admin" | "hr" | "employee";

export type DashboardTile = {
  id: string;
  title: string;
  description?: string;
  route: string;
  Icon: ComponentType<SVGProps<SVGSVGElement>>;
  roles: DashboardRole[];
};

export const dashboardTiles: DashboardTile[] = [
  {
    id: "employees",
    title: "Employees",
    description: "Kelola data karyawan",
    route: "/employees",
    Icon: Users,
    roles: ["admin", "hr"],
  },
  {
    id: "divisions",
    title: "Divisions",
    description: "Kelola divisi",
    route: "/divisions",
    Icon: Building2,
    roles: ["admin", "hr"],
  },
  {
    id: "shifts",
    title: "Shifts",
    description: "Jadwal shift",
    route: "/shifts",
    Icon: Clock,
    roles: ["admin", "hr"],
  },
  {
    id: "attendances",
    title: "Attendances",
    description: "Presensi dan scan QR",
    route: "/attendances",
    Icon: Activity,
    roles: ["admin", "hr", "employee"],
  },
  {
    id: "payrolls",
    title: "Payrolls",
    description: "Penggajian",
    route: "/payrolls",
    Icon: DollarSign,
    roles: ["admin", "hr"],
  },
  {
    id: "jobVacancies",
    title: "Job Vacancies",
    description: "Lowongan pekerjaan",
    route: "/jobVacancies",
    Icon: Briefcase,
    roles: ["admin", "hr"],
  },
  {
    id: "applicants",
    title: "Applicants",
    description: "Kelola pelamar",
    route: "/applicants",
    Icon: FileText,
    roles: ["admin", "hr"],
  },
  {
    id: "performance",
    title: "Performance Reviews",
    description: "Penilaian karyawan",
    route: "/performanceReviews",
    Icon: ClipboardList,
    roles: ["admin", "hr"],
  },
];

export function getTilesForRole(role?: DashboardRole) {
  if (!role) return [];
  return dashboardTiles.filter((tile) => tile.roles.includes(role));
}