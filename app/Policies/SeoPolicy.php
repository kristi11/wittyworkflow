<?php

namespace App\Policies;

use App\Models\Seo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SeoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Seo $seo): bool
    {
        //
    }

    public function save(User $user, Seo $seo): bool
    {
        // Check if the user has permission to create or update SEO records
        return $user->can('is_admin') || ($user->id === $seo->user_id && $user->can('is_admin'));
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('is_admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Seo $seo): bool
    {
        return $user?->id === $seo->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Seo $seo): bool
    {
        return $user?->id === $seo->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Seo $seo): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Seo $seo): bool
    {
        //
    }
}
