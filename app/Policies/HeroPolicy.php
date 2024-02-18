<?php

namespace App\Policies;

use App\Models\Hero;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HeroPolicy
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
    public function view(User $user, Hero $hero): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function save(User $user, Hero $hero): bool
    {
        // Check if the user has permission to create or update SEO records
        return $user->can('is_admin') || ($user->id === $hero->user_id && $user->can('is_admin'));
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
    public function update(User $user, Hero $hero): bool
    {
        return $user?->id === $hero->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hero $hero): bool
    {
        return $user?->id === $hero->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Hero $hero): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Hero $hero): bool
    {
        //
    }
}
