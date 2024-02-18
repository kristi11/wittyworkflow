<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppointmentPolicy
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
    public function view(User $user, Appointment $appointment): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function save(User $user, Appointment $appointment): bool
    {
        // Check if the user has permission to create or update Appointment records
//        return $user->can('is_user') || ($user->id === $appointment->user_id && $user->can('is_user'));
        return true;
    }

    public function changeStatus(User $user): bool
    {
        return $user->can('is_admin');
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Appointment $appointment): bool
    {
        return $user?->id === $appointment->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Appointment $appointment): bool
    {
        return $user?->id === $appointment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Appointment $appointment): bool
    {
        return $user?->id === $appointment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Appointment $appointment): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Appointment $appointment): bool
    {
        //
    }
}
