<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use App\Models\articles;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(GenericUser $profil): bool
    {
        return ($profil->role === 'superAdmin') || ($profil->role === 'admin');
    }


    /**
     * Determine whether the user can view the model.
     */
    public function view(GenericUser $profil, Article $article): bool
    {
        // Vérifier si le profil est super admin
        if ($profil->role === 'superAdmin' || $profil->role === 'admin') {
            return true; // Le super admin peut mettre à jour n'importe quel article
        }

        // Sinon, vérifier si le profil correspond à l'auteur de l'article
        return $profil->id === $article->profil_id;    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(GenericUser $profil, Article $article): bool
    {
        // Vérifier si le profil est super admin
        if ($profil->role === 'superAdmin') {
            return true; // Le super admin peut mettre à jour n'importe quel article
        }

        // Sinon, vérifier si le profil correspond à l'auteur de l'article
        return $profil->id === $article->profil_id;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(GenericUser $profil, Article $article): bool
    {
        // Vérifier si le profil est super admin
        if ($profil->role === 'superAdmin') {
            return true; // Le super admin peut mettre à jour n'importe quel article
        }

        // Sinon, vérifier si le profil correspond à l'auteur de l'article
        return $profil->id === $article->profil_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, articles $articles): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, articles $articles): bool
    {
        //
    }
}
