<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{ 
    //---------------- ADMIN POLICIES ----------------\\
    
    /**
     * Determine whether the user can view any models.
     */
    public function viewAnyAdmin(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }

    /**
     * Determine whether the user can create models.
     */
    public function store(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }
}
