Backend

![Backend Tests](https://github.com/ReizalPutra/prayerkids-hr/actions/workflows/backend-tests.yml/badge.svg)

Prerequisites

- PHP 8.2+
- Composer
- pnpm (frontend package manager)

Quick setup (from repo root)

PowerShell / Windows:

```powershell
cd backend
composer install
pnpm install
copy .env.example .env
php artisan key:generate
php artisan migrate --force
pnpm run build
```

If sqlite files were accidentally committed, run from repository root:

```powershell
.\scripts\remove-committed-sqlite.ps1
```

Development (local)

- Start backend only:

```powershell
cd backend
php artisan serve --host=0.0.0.0 --port=8000
```

- Start frontend only (from repo root):

```powershell
cd frontend
pnpm install
pnpm run dev
```

- Dev (both): use the composer `dev` script from `backend` (starts server, queue listener, vite):

```powershell
cd backend
composer run-script dev
```

Docker (development)

- Build and run backend container:

```powershell
docker build -t prayerkids-backend -f backend/Dockerfile backend
docker run --rm -p 8000:8000 -e APP_ENV=local -v %CD%/backend:/app prayerkids-backend
```

Notes

- Coverage reports are produced by CI and uploaded as an artifact `coverage-report`.
- The Scribe try-it-out asset has been cleaned of debug logs; see `backend/public/vendor/scribe/js/tryitout-5.9.0.js`.
