<?php

namespace App\Policies;

use App\Models\JobVacancy;
use App\Models\User;

class JobVacancyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_job_vacancies');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobVacancy $jobVacancy): bool
    {
        return $user->hasPermissionTo('view_job_vacancies');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_job_vacancies');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobVacancy $jobVacancy): bool
    {
        return $user->hasPermissionTo('manage_job_vacancies');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobVacancy $jobVacancy): bool
    {
        return $user->hasPermissionTo('manage_job_vacancies');
    }
}
