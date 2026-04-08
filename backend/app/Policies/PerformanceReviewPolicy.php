<?php

namespace App\Policies;

use App\Models\PerformanceReview;
use App\Models\User;

class PerformanceReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_performance_reviews');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PerformanceReview $performanceReview): bool
    {
        return $user->hasPermissionTo('view_performance_reviews');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_performance_reviews');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PerformanceReview $performanceReview): bool
    {
        return $user->hasPermissionTo('manage_performance_reviews');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PerformanceReview $performanceReview): bool
    {
        return $user->hasPermissionTo('manage_performance_reviews');
    }
}
