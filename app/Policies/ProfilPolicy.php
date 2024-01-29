<?php

namespace App\Policies;

use App\Models\User;
use App\Models\profils;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;

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
    public function view(User $user, profils $profils): bool
    {
        //
    }

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
    public function update(GenericUser $profil): bool
    { //
        return $profil->role === "superAdmin";

    }

    /**
     * Determine whether the user can delete the model.
     */
    // public function delete(User $user, profils $profils): bool
    // {
    //     //
    // }

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
       
