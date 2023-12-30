<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewNickname(User $user): bool
    {
        return in_array($user->role, [UserRole::User, UserRole::Moderator, UserRole::Admin]);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, [UserRole::User, UserRole::Moderator, UserRole::Admin]);
    }

    public function delete(User $user, Comment $comment): bool
    {
        return $comment->user_id == $user->id ||
            ($comment->user->role != UserRole::Admin && $user->role == UserRole::Moderator) ||
            $user->role == UserRole::Admin;
    }
}
