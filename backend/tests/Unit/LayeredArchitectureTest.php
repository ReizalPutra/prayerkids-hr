<?php

use App\Contracts\Repositories\ApplicantRepositoryInterface;
use App\Contracts\Repositories\AttendanceLocationRepositoryInterface;
use App\Contracts\Repositories\AttendanceRepositoryInterface;
use App\Contracts\Repositories\ContractTemplateRepositoryInterface;
use App\Contracts\Repositories\DivisionRepositoryInterface;
use App\Contracts\Repositories\EmployeeRepositoryInterface;
use App\Contracts\Repositories\JobVacancyRepositoryInterface;
use App\Contracts\Repositories\LeaveRequestRepositoryInterface;
use App\Contracts\Repositories\PayrollRepositoryInterface;
use App\Contracts\Repositories\PerformanceReviewRepositoryInterface;
use App\Contracts\Repositories\PositionRepositoryInterface;
use App\Contracts\Repositories\ShiftRepositoryInterface;
use App\Contracts\Services\ApplicantServiceInterface;
use App\Contracts\Services\AttendanceLocationServiceInterface;
use App\Contracts\Services\AttendanceServiceInterface;
use App\Contracts\Services\ContractTemplateServiceInterface;
use App\Contracts\Services\DivisionServiceInterface;
use App\Contracts\Services\EmployeeServiceInterface;
use App\Contracts\Services\JobVacancyServiceInterface;
use App\Contracts\Services\LeaveRequestServiceInterface;
use App\Contracts\Services\PayrollServiceInterface;
use App\Contracts\Services\PerformanceReviewServiceInterface;
use App\Contracts\Services\PositionServiceInterface;
use App\Contracts\Services\ShiftServiceInterface;
use App\Repositories\ApplicantRepository;
use App\Repositories\AttendanceLocationRepository;
use App\Repositories\AttendanceRepository;
use App\Repositories\ContractTemplateRepository;
use App\Repositories\DivisionRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\JobVacancyRepository;
use App\Repositories\LeaveRequestRepository;
use App\Repositories\PayrollRepository;
use App\Repositories\PerformanceReviewRepository;
use App\Repositories\PositionRepository;
use App\Repositories\ShiftRepository;
use App\Services\ApplicantService;
use App\Services\AttendanceLocationService;
use App\Services\AttendanceService;
use App\Services\ContractTemplateService;
use App\Services\DivisionService;
use App\Services\EmployeeService;
use App\Services\JobVacancyService;
use App\Services\LeaveRequestService;
use App\Services\PayrollService;
use App\Services\PerformanceReviewService;
use App\Services\PositionService;
use App\Services\ShiftService;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('resolves repository bindings via contracts', function () {
    $bindings = [
        ApplicantRepositoryInterface::class => ApplicantRepository::class,
        AttendanceRepositoryInterface::class => AttendanceRepository::class,
        AttendanceLocationRepositoryInterface::class => AttendanceLocationRepository::class,
        ContractTemplateRepositoryInterface::class => ContractTemplateRepository::class,
        DivisionRepositoryInterface::class => DivisionRepository::class,
        EmployeeRepositoryInterface::class => EmployeeRepository::class,
        JobVacancyRepositoryInterface::class => JobVacancyRepository::class,
        LeaveRequestRepositoryInterface::class => LeaveRequestRepository::class,
        PayrollRepositoryInterface::class => PayrollRepository::class,
        PerformanceReviewRepositoryInterface::class => PerformanceReviewRepository::class,
        PositionRepositoryInterface::class => PositionRepository::class,
        ShiftRepositoryInterface::class => ShiftRepository::class,
    ];

    foreach ($bindings as $contract => $implementation) {
        $resolved = app($contract);
        expect($resolved)->toBeInstanceOf($implementation);
    }
});

it('resolves service bindings via contracts', function () {
    $bindings = [
        ApplicantServiceInterface::class => ApplicantService::class,
        AttendanceServiceInterface::class => AttendanceService::class,
        AttendanceLocationServiceInterface::class => AttendanceLocationService::class,
        ContractTemplateServiceInterface::class => ContractTemplateService::class,
        DivisionServiceInterface::class => DivisionService::class,
        EmployeeServiceInterface::class => EmployeeService::class,
        JobVacancyServiceInterface::class => JobVacancyService::class,
        LeaveRequestServiceInterface::class => LeaveRequestService::class,
        PayrollServiceInterface::class => PayrollService::class,
        PerformanceReviewServiceInterface::class => PerformanceReviewService::class,
        PositionServiceInterface::class => PositionService::class,
        ShiftServiceInterface::class => ShiftService::class,
    ];

    foreach ($bindings as $contract => $implementation) {
        $resolved = app($contract);
        expect($resolved)->toBeInstanceOf($implementation);
    }
});

it('executes shift CRUD through service and repository layers', function () {
    $service = app(ShiftServiceInterface::class);

    $created = $service->create([
        'name' => 'Layered Shift',
        'start_time' => '08:00:00',
        'end_time' => '16:00:00',
    ]);

    expect($created->name)->toBe('Layered Shift');

    $updated = $service->update($created, [
        'name' => 'Layered Shift Updated',
        'start_time' => '09:00:00',
        'end_time' => '17:00:00',
    ]);

    expect($updated->name)->toBe('Layered Shift Updated');

    $service->delete($updated);

    $deletedAt = DB::table('shifts')->where('id', $updated->id)->value('deleted_at');

    expect($deletedAt)->not->toBeNull();
});
