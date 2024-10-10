<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

class CommentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function store(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user !== null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function update(?User $user, Comment $comment): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->id === $comment->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function delete(?User $user, Comment $comment): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->id === $comment->user_id || $user->role_id === 2;
    }

    //---------------- ADMIN POLICIES ----------------\\
    
    /**
     * Determine whether the user can update the model.
     */
    public function viewWithoutTrashed(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->role_id === 2;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function viewOnlyTrashed(?User $user): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->role_id === 2;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(?User $user, Comment $comment): bool
    {
        if ($user === null) {
            return false;
        }
        return $user->role_id === 2;
    }
}
