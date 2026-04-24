#!/usr/bin/env sh
set -eu

if [ ! -f .env ]; then
  cp .env.example .env
fi

if [ ! -d vendor ]; then
  composer install --no-interaction --prefer-dist
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

php artisan migrate --force
php artisan serve --host=0.0.0.0 --port=8000
