<?php

namespace App\Providers;

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
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repository bindings.
     */
    public function register(): void
    {
        $this->app->bind(ApplicantRepositoryInterface::class, ApplicantRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(AttendanceLocationRepositoryInterface::class, AttendanceLocationRepository::class);
        $this->app->bind(ContractTemplateRepositoryInterface::class, ContractTemplateRepository::class);
        $this->app->bind(DivisionRepositoryInterface::class, DivisionRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(JobVacancyRepositoryInterface::class, JobVacancyRepository::class);
        $this->app->bind(LeaveRequestRepositoryInterface::class, LeaveRequestRepository::class);
        $this->app->bind(PayrollRepositoryInterface::class, PayrollRepository::class);
        $this->app->bind(PerformanceReviewRepositoryInterface::class, PerformanceReviewRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, PositionRepository::class);
        $this->app->bind(ShiftRepositoryInterface::class, ShiftRepository::class);
    }
}
