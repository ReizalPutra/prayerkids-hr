<?php

namespace App\Policies;

use App\Models\ContractTemplate;
use App\Models\User;

class ContractTemplatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_contract_templates');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ContractTemplate $contractTemplate): bool
    {
        return $user->hasPermissionTo('view_contract_templates');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_contract_templates');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ContractTemplate $contractTemplate): bool
    {
        return $user->hasPermissionTo('manage_contract_templates');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ContractTemplate $contractTemplate): bool
    {
        return $user->hasPermissionTo('manage_contract_templates');
    }
}
