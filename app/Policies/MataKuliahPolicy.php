<?php

namespace App\Policies;

use App\Models\Mata_kuliah;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MataKuliahPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Mata_kuliah $mataKuliah)
    {
        // Allow admin to access everything
        if ($user->isAdmin()) {
            return true;
        }

        // For non-admin users, check NIP
        return in_array($user->NIP, [
            $mataKuliah->NIP,
            $mataKuliah->NIP2,
            $mataKuliah->NIP3,
            $mataKuliah->NIP4,
        ]);
    }

}
