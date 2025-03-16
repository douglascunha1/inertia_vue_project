<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function delete(User $user)
    {
        return $user->email === 'contact.dougcunha.dev@gmail.com';
    }
}
