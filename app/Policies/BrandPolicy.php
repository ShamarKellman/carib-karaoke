<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BrandPolicy
{
    public function viewAny(User|Administrator $user): Response
    {
        return Response::allow();
    }

    public function view(User|Administrator $user, Brand $brand): Response
    {
        return Response::allow();
    }

    public function create(User|Administrator $user): Response
    {
        return Response::allow();
    }

    public function update(User|Administrator $user, Brand $brand): Response
    {
        return Response::allow();
    }

    public function delete(User|Administrator $user, Brand $brand): Response
    {
        return Response::allow();
    }

    public function restore(User|Administrator $user, Brand $brand): Response
    {
        return Response::allow();
    }

    public function forceDelete(User|Administrator $user, Brand $brand): Response
    {
        return Response::allow();
    }
}
