<?php

namespace App\Policies;

use App\Models\BusinessHour;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BusinessHourPolicy
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
    public function view(User $user, BusinessHour $businessHour): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function save(User $user, BusinessHour $businessHour): bool
    {
        // Check if the user has permission to create or update SEO records
        return $user->can('is_admin') || ($user->id === $businessHour->user_id && $user->can('is_admin'));
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
    public function update(User $user, BusinessHour $businessHour): bool
    {
        return $user?->id === $businessHour->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BusinessHour $businessHour): bool
    {
        return $user?->id === $businessHour->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BusinessHour $businessHour): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BusinessHour $businessHour): bool
    {
        //
    }
}
