<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $authUser, User $user): bool
    {
        return $authUser->id === $user->id;
    }

    public function update(User $authUser, User $user): bool
    {
        return $authUser->id === $user->id;
    }


    public function edit(User $authUser, User $user): bool
    {
        return $authUser->id === $user->id;
    }

    public function delete(User $user, User $model): bool
    {
        
    }

    public function blogs(User $authUser, User $user): bool
    {
        return $authUser->id === $user->id;
    }
}
