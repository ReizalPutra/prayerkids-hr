<?php

namespace App\Providers;

use App\Models\AttendanceLocation;
use App\Models\Division;
use App\Models\Position;
use App\Models\Shift;
use App\Policies\AttendanceLocationPolicy;
use App\Policies\DivisionPolicy;
use App\Policies\LocationPolicy;
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
    AttendanceLocation::class => LocationPolicy::class,
        Division::class => DivisionPolicy::class,
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
