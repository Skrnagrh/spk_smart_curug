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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('is_staff_or_admin', function(User $user) {
            return $user->role == 'staff' || $user->role == 'admin';
        });

        Gate::define('is_staff', function(User $user) {
            return $user->role == 'staff';
        });

        Gate::define('is_admin', function(User $user) {
            return $user->role == 'admin';
        });

        // Gate::define('anggota', function(User $user) {
        //     return $user->role == 'anggota';
        // });
        Gate::define('wisatawan', function(User $user) {
            return $user->role == 'wisatawan';
        });
    }
}
