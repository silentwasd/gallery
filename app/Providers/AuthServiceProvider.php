<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Person;
use App\Models\Tag;
use App\Models\User;
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
        //
        Person::class => PersonPolicy::class,
        User::class   => UserPolicy::class,
        Tag::class    => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
