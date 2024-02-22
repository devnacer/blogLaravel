<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): bool
    {
        return true;

    }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, Category $category): bool
    // {
        
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create(GenericUser $profil): bool
    {
        return $profil->role === 'superAdmin' || $profil->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(GenericUser $profil): bool
    {
        return $profil->role === 'superAdmin' || $profil->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(GenericUser $profil): bool
    {
        return $profil->role === 'superAdmin' || $profil->role === 'admin';

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Category $category): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        //
    }
}
