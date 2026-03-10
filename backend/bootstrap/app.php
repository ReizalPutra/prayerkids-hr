<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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
        //
        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'meta' => [
                        'code' => 403,
                        'status' => 'error',
                        'message' => $e->getMessage() ?: 'Anda tidak memiliki izin untuk mengakses resource ini.',
                    ],
                    'data' => null
                ], 403);
            }
        });
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'meta' => [
                        'code' => 401,
                        'status' => 'error',
                        'message' => $e->getMessage()?: 'Sesi login tidak valid atau Anda belum login.',
                    ],
                    'data' => null
                ], 401);
            }
        });
    })->create();
