<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profil;
use App\Models\profils;
use Illuminate\Auth\GenericUser;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ProfilPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(GenericUser $profil): bool
    {
        return $profil->role === "superAdmin";
    }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(): bool
    // {
    //     // return $profil->role === 'superAdmin' || $profil->role === 'admin';
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create(GenericUser $profil): bool
    {
        return $profil->role === "superAdmin";
    }

    /**
     * Determine whether the user can update the model.
     */


    public function update(GenericUser $authenticatedUser, Profil $targetProfile)
    {
        // Check if the authenticated user can update their own profile
        if ($authenticatedUser->id === $targetProfile->id) {
            return true;
        }

        // Check if the authenticated user has the 'superAdmin' role
        if ($authenticatedUser->role === 'superAdmin') {
            return true;
        }

        // Unauthorized attempt to update another user's profile
        return false;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(GenericUser $authenticatedUser, Profil $targetProfile)
    {
        // Check if the authenticated user can update their own profile
        if ($authenticatedUser->id === $targetProfile->id) {
            return true;
        }

        // Check if the authenticated user has the 'superAdmin' role
        if ($authenticatedUser->role === 'superAdmin') {
            return true;
        }

        // Unauthorized attempt to update another user's profile
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, profils $profils): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, profils $profils): bool
    {
        //
    }
}
