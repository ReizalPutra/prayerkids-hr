<?php

namespace App\Policies;

use App\Models\Division;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DivisionPolicy
{

    /**
     * Determine whether the user hasPermissionTo view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_divisions');
    }

    /**
     * Determine whether the user hasPermissionTo view the model.
     */
    public function view(User $user, Division $division): bool
    {
        return $user->hasPermissionTo('view_divisions');
    }

    /**
     * Determine whether the user hasPermissionTo create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_divisions');
    }

    /**
     * Determine whether the user hasPermissionTo update the model.
     */
    public function update(User $user, Division $division): bool
    {
        return $user->hasPermissionTo('manage_divisions');
    }

    /**
     * Determine whether the user hasPermissionTo delete the model.
     */
    public function delete(User $user, Division $division): bool
    {
        return $user->hasPermissionTo('manage_divisions');
    }

    /**
     * Determine whether the user hasPermissionTo restore the model.
     */
    public function restore(User $user, Division $division): bool
    {
        return $user->hasPermissionTo('manage_divisions');
    }

    /**
     * Determine whether the user hasPermissionTo permanently delete the model.
     */
    public function forceDelete(User $user, Division $division): bool
    {
        return $user->hasPermissionTo('manage_divisions');
    }
}
