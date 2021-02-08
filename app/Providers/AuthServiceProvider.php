<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // kontrola ci je user admin
        Gate::before(function ($user)
        {
            if ($user->hasRole('administrator')) {
                return true;
            }

        });

        Gate::define('edit-recipe', function ($user, $recipe)
        {
            return $user->id == $recipe->user_id;
        });

        Gate::define('delete-comment', function ($user, $comment)
        {
            return $user->id == $comment->user_id;
        });

        // compare user objects - EDIT USER
        Gate::define('is-user', function ($logged_in_user, $user)
        {
            return $logged_in_user->id == $user->id;
        });
    }
}
