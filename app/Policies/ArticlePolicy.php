<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can store the model.
     */
    public function create(?User $user): bool
    {
        return $user !== null;
    }
    
    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, $article): bool
    {
        return $article->deleted_at === null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(?User $user, Article $article): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->id === $article->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user, Article $article): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->id === $article->user_id || $user->is_admin;
    }

    //---------------- ADMIN POLICIES ----------------\\
    
    /**
     * Determine whether the user can view any models.
     */
    public function viewWithoutTrashed(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }

    public function viewPendingValidation(?User $user): bool
    {   
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }

    public function viewOnlyTrashed(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->is_admin;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function editVisibility(?User $user): bool
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
