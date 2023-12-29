<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Person;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return in_array($user->role, [UserRole::Admin, UserRole::Moderator]);
    }

    public function delete(User $user, Person $person): bool
    {
        return $user->role == UserRole::Admin;
    }
}
