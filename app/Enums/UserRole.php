<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin     = 'admin';
    case Moderator = 'moderator';
    case User      = 'user';

    public function view(): string
    {
        return match ($this) {
            self::Admin     => __('control.users.roles.admin'),
            self::Moderator => __('control.users.roles.moderator'),
            self::User      => __('control.users.roles.user')
        };
    }
}
