<?php

namespace App\Policies;

use App\Models\Applicant;
use App\Models\User;

class ApplicantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_applicants');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Applicant $applicant): bool
    {
        return $user->hasPermissionTo('view_applicants');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_applicants');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Applicant $applicant): bool
    {
        return $user->hasPermissionTo('manage_applicants');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Applicant $applicant): bool
    {
        return $user->hasPermissionTo('manage_applicants');
    }
}
