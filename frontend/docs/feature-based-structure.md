# Feature-Based Frontend Structure

This frontend is moving from a broad page-based layout toward a feature-based structure.

The goal is simple: every domain keeps its own pages, components, data, hooks, and helpers together so feature work can move independently without breaking unrelated areas.

## Goals

- Keep domain-specific code together.
- Reduce import chains between unrelated folders.
- Make it easier to split a feature into its own page, components, hooks, and data.

## Folder Rules

- `src/components/ui`: shared design-system primitives.
- `src/components/layout`: shell-level layout components.
- `src/features/<feature>`: domain logic, feature pages, feature components, feature data, and feature-specific helpers.
- `src/pages`: thin route wrappers or legacy compatibility exports.

## Current Feature Map

- `src/features/dashboard`: dashboard tiles, dashboard page, and dashboard-specific presentation.
- `src/features/resources`: generic CRUD configuration and the reusable resource view.
- `src/features/auth`: auth flows and session-related helpers.
- `src/features/attendance`: attendance flow and scanning-related behavior.
- `src/features/employees`: employee domain screens and helpers.
- `src/features/payroll`: payroll domain screens and helpers.
- `src/features/requirment`: reserved for requirement-specific or legacy migration work.

## Recommended Feature Pattern

Each feature should follow a consistent shape:

- `pages/`: route-level page composition.
- `components/`: feature-specific UI pieces.
- `hooks/`: feature-only data loading or mutations.
- `services/`: API calls or adapters.
- `types/`: feature-local type definitions.
- `utils/`: pure helpers that are only useful inside that feature.

## Example

The dashboard has started this migration:

- `src/features/dashboard/pages/DashboardPage.tsx` owns the dashboard screen.
- `src/features/dashboard/dashboard-tiles.ts` owns role-based dashboard tiles.
- `src/pages/DashboardPage.tsx` re-exports the feature page for routing compatibility.

`src/features/resources` already follows the same idea for CRUD configuration: the generic resource metadata lives there instead of inside pages.

## Migration Approach

1. Create a feature folder.
2. Move feature-specific data and helpers into that folder.
3. Move the page composition into `features/<feature>/pages`.
4. Keep `src/pages` as a thin bridge until the router and callers are fully migrated.
5. Once stable, remove the bridge file if it is no longer needed.

## Next Features To Build

The remaining feature work should be added inside the matching feature folder first, then wired into routes.

- `attendance`: QR scan, location checks, attendance history, and employee attendance detail.
- `employees`: employee profile, account assignment, contract info, and status management.
- `payroll`: payroll list, detail, slips, and period actions.
- `auth`: login, forgot password, and session cleanup.
- `dashboard`: richer KPI cards, recent activity, and role-aware quick actions.

When a feature grows, extract shared UI into `src/components` only after at least two features need the same abstraction.
