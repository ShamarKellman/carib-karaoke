<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArtistPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User|Administrator $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User|Administrator $user, Artist $artist): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User|Administrator $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User|Administrator $user, Artist $artist): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User|Administrator $user, Artist $artist): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User|Administrator $user, Artist $artist): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User|Administrator $user, Artist $artist): Response
    {
        return Response::allow();
    }
}
