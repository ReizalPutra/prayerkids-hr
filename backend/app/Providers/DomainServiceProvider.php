<?php

namespace App\Providers;

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
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register domain service bindings.
     */
    public function register(): void
    {
        $this->app->bind(ApplicantServiceInterface::class, ApplicantService::class);
        $this->app->bind(AttendanceServiceInterface::class, AttendanceService::class);
        $this->app->bind(AttendanceLocationServiceInterface::class, AttendanceLocationService::class);
        $this->app->bind(ContractTemplateServiceInterface::class, ContractTemplateService::class);
        $this->app->bind(DivisionServiceInterface::class, DivisionService::class);
        $this->app->bind(EmployeeServiceInterface::class, EmployeeService::class);
        $this->app->bind(JobVacancyServiceInterface::class, JobVacancyService::class);
        $this->app->bind(LeaveRequestServiceInterface::class, LeaveRequestService::class);
        $this->app->bind(PayrollServiceInterface::class, PayrollService::class);
        $this->app->bind(PerformanceReviewServiceInterface::class, PerformanceReviewService::class);
        $this->app->bind(PositionServiceInterface::class, PositionService::class);
        $this->app->bind(ShiftServiceInterface::class, ShiftService::class);
    }
}
