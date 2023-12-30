<?php

namespace App\Providers;

use App\Enums\UserRole;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;
use App\Models\Person;
use App\Models\Tag;
use App\Models\User;
use App\Policies\CommentPolicy;
use App\Policies\PersonPolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Person::class  => PersonPolicy::class,
        User::class    => UserPolicy::class,
        Tag::class     => TagPolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('control', function (User $user) {
            return in_array($user->role, [UserRole::Admin, UserRole::Moderator]);
        });
    }
}
