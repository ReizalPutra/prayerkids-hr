<?php

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $apiError = static function (int $code, string $message, $errors = null) {
            return response()->json([
                'meta' => [
                    'code' => $code,
                    'status' => 'error',
                    'message' => $message,
                ],
                'errors' => $errors,
            ], $code);
        };

        $isApiRequest = static fn(Request $request): bool => $request->is('api/*');

        $exceptions->render(function (ValidationException $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            return $apiError(422, 'Validasi request gagal.', $e->errors());
        });

        $exceptions->render(function (AuthorizationException $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            return $apiError(403, $e->getMessage() ?: 'Anda tidak memiliki izin untuk mengakses resource ini.');
        });

        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            return $apiError(403, $e->getMessage() ?: 'Anda tidak memiliki izin untuk mengakses resource ini.');
        });

        $exceptions->render(function (AuthenticationException $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            return $apiError(401, $e->getMessage() ?: 'Sesi login tidak valid atau Anda belum login.');
        });

        $exceptions->render(function (ModelNotFoundException $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            return $apiError(404, 'Data yang diminta tidak ditemukan.');
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            return $apiError(404, 'Endpoint tidak ditemukan.');
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            return $apiError(405, 'Method HTTP tidak diizinkan untuk endpoint ini.');
        });

        $exceptions->render(function (Throwable $e, Request $request) use ($apiError, $isApiRequest) {
            if (! $isApiRequest($request)) {
                return null;
            }

            $message = app()->environment('local')
                ? $e->getMessage()
                : 'Terjadi kesalahan pada server.';

            return $apiError(500, $message);
        });
    })->create();
