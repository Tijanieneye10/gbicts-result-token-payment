<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Sales;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Check if a user is admin
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'Admin';
        });

        // Update sold time on sales table
        Gate::define('updateSoldTime', function (User $user, Sales $sales) {
            return $user->id === $sales->user_id;
        });
    }
}
