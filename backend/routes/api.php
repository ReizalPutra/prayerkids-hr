<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\AttendanceLocationController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    Route::apiResource('divisions', DivisionController::class);
    Route::apiResource('positions', PositionController::class);
    Route::apiResource('shifts', ShiftController::class);
    Route::apiResource('attendanceLocations', AttendanceLocationController::class);
});
