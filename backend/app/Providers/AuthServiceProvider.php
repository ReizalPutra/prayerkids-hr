<?php

namespace App\Providers;

use App\Models\Applicant;
use App\Models\Attendance;
use App\Models\AttendanceLocation;
use App\Models\ContractTemplate;
use App\Models\Division;
use App\Models\Employee;
use App\Models\JobVacancy;
use App\Models\LeaveRequest;
use App\Models\Payroll;
use App\Models\PerformanceReview;
use App\Models\Position;
use App\Models\Shift;
use App\Policies\ApplicantPolicy;
use App\Policies\AttendancePolicy;
use App\Policies\AttendanceLocationPolicy;
use App\Policies\ContractTemplatePolicy;
use App\Policies\DivisionPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\JobVacancyPolicy;
use App\Policies\LeaveRequestPolicy;
use App\Policies\PayrollPolicy;
use App\Policies\PerformanceReviewPolicy;
use App\Policies\PositionPolicy;
use App\Policies\ShiftPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Applicant::class => ApplicantPolicy::class,
        Attendance::class => AttendancePolicy::class,
        AttendanceLocation::class => AttendanceLocationPolicy::class,
        ContractTemplate::class => ContractTemplatePolicy::class,
        Division::class => DivisionPolicy::class,
        Employee::class => EmployeePolicy::class,
        JobVacancy::class => JobVacancyPolicy::class,
        LeaveRequest::class => LeaveRequestPolicy::class,
        Payroll::class => PayrollPolicy::class,
        PerformanceReview::class => PerformanceReviewPolicy::class,
        Position::class => PositionPolicy::class,
        Shift::class => ShiftPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
