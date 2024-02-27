<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('scolarite', function(User $user) {
            return $user->hasRole('scolarite');
        });
        Gate::define('genie_info', function(User $user) {
            return $user->hasRole('genie_info');
        });
        Gate::define('s_energie', function(User $user) {
            return $user->hasRole('s_energie');
        });
        Gate::define('imp', function(User $user) {
            return $user->hasRole('imp');
        });
        Gate::define('s_technique', function(User $user) {
            return $user->hasRole('s_technique');
        });
        Gate::define('teb', function(User $user) {
            return $user->hasRole('teb');
        });
        Gate::define('t_laboratoire', function(User $user) {
            return $user->hasRole('t_laboratoire');
        });
        Gate::define('admin', function(User $user) {
            return $user->hasRole('admin');
        });
    }
}
