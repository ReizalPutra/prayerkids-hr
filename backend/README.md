Backend setup (minimal)

Prerequisites:
- PHP 8.2+, Composer
- pnpm (we standardize on pnpm for JS packages)

Quick setup (from repo root):

PowerShell / Windows:

```powershell
cd backend
composer install
pnpm install
cp .env.example .env
php artisan key:generate
php artisan migrate --force
pnpm run build
```

If sqlite files were accidentally committed, run from repository root:

```powershell
.\scripts\remove-committed-sqlite.ps1
```

Development:
- Use `pnpm run dev` in `frontend` and `php artisan serve` for backend, or run the combined dev command via Composer script from the repo root:

```powershell
cd backend
composer run-script dev
```

