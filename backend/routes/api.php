<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PositionController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::prefix('master')->group(function () {

        Route::apiResource('divisions', DivisionController::class);
        Route::apiResource('positions', PositionController::class);
    });
});
