#!/usr/bin/env sh
set -eu

if [ ! -f .env ]; then
  if [ -f .env.example ]; then
    cp .env.example .env
  else
    echo "Warning: .env.example not found, creating minimal .env"
    cat > .env <<EOF
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000
EOF
  fi
fi

php -r '
$env = parse_ini_file(".env");
if (!isset($env["APP_KEY"]) || trim((string) $env["APP_KEY"]) === "") {
    exit(0);
}
exit(1);
' && php artisan key:generate --force || true

DB_HOST="${DB_HOST:-mysql}"
DB_PORT="${DB_PORT:-3306}"
DB_CONNECTION="${DB_CONNECTION:-mysql}"
DB_DATABASE="${DB_DATABASE:-prayerkids_hr}"
DB_USERNAME="${DB_USERNAME:-root}"
DB_PASSWORD="${DB_PASSWORD:-root}"

export DB_CONNECTION DB_HOST DB_PORT DB_DATABASE DB_USERNAME DB_PASSWORD

echo "Waiting for database at ${DB_HOST}:${DB_PORT}..."
php -r '
$host = getenv("DB_HOST") ?: "mysql";
$port = (int) (getenv("DB_PORT") ?: 3306);
$maxAttempts = 60;
for ($i = 1; $i <= $maxAttempts; $i++) {
    $fp = @fsockopen($host, $port, $errno, $errstr, 2);
    if ($fp) {
        fclose($fp);
        exit(0);
    }
    fwrite(STDOUT, "Attempt {$i}/{$maxAttempts}: waiting for DB...\n");
    sleep(2);
}
fwrite(STDERR, "Database is not reachable.\n");
exit(1);
'

php artisan optimize:clear || true
php artisan package:discover --ansi || true
php artisan migrate --force

if [ "${RUN_DB_SEEDER:-true}" = "true" ]; then
  php artisan db:seed --force
fi

if [ "${APP_ENV:-local}" = "production" ]; then
  php artisan config:cache || true
  php artisan route:cache || true
  php artisan view:cache || true
fi

php artisan serve --host=0.0.0.0 --port=8000
