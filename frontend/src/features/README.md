# Features Folder Guide

This folder contains domain-focused frontend code.

## Purpose

Keep each business area together so pages, components, hooks, and helpers stay close to the feature they serve.

## Current Features

- `dashboard`: dashboard page composition and role-based tiles.
- `resources`: reusable CRUD configuration and generic resource views.
- `auth`: authentication flows and session helpers.
- `attendance`: attendance workflow and QR scanning.
- `employees`: employee management screens and helpers.
- `payroll`: payroll screens and helpers.
- `requirment`: reserved for legacy or migration work.

## Recommended Folder Shape

```text
src/features/<feature>/
  pages/
  components/
  hooks/
  services/
  types/
  utils/
```

## Working Rules

- Put feature-specific code in the feature folder first.
- Keep `src/pages` as a temporary bridge for routing compatibility.
- Move shared UI into `src/components` only when two or more features need it.
- Prefer feature-local helpers over cross-folder imports when the logic is domain-specific.

## Building A New Feature

1. Create the feature folder.
2. Add the page under `pages/`.
3. Add the API or state logic under `hooks/` or `services/`.
4. Add feature-specific UI under `components/`.
5. Export what routing or other features need through a small barrel file.
6. Document the feature in `frontend/docs/feature-based-structure.md` if it becomes a core domain.
