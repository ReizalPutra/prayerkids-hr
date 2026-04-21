<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\AttendanceLocationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PerformanceReviewController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ContractTemplateController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Operational Routes
    Route::apiResource('divisions', DivisionController::class);
    Route::apiResource('positions', PositionController::class);
    Route::apiResource('shifts', ShiftController::class);
    Route::apiResource('attendanceLocations', AttendanceLocationController::class);
    Route::get('attendanceLocations/{attendanceLocation}/qr', [AttendanceLocationController::class, 'qr']);
    Route::apiResource('contractTemplates', ContractTemplateController::class);

    // HR Management Routes
    Route::apiResource('employees', EmployeeController::class);
    Route::post('attendances/scan-qr', [AttendanceController::class, 'scanQr']);
    Route::apiResource('attendances', AttendanceController::class);
    Route::apiResource('leaveRequests', LeaveRequestController::class);
    Route::apiResource('payrolls', PayrollController::class);
    Route::apiResource('performanceReviews', PerformanceReviewController::class);

    // Recruitment Routes
    Route::apiResource('jobVacancies', JobVacancyController::class);
    Route::apiResource('applicants', ApplicantController::class);
});
