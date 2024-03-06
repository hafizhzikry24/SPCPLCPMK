<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function isAdmin(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }// Adjust this based on your logic to determine if the user is an admin
    }
}
