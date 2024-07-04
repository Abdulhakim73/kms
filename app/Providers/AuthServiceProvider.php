<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\Request;
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
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('update', function ($user, $certificate) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                return $certificate->branch_user_id === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return false;
            }
            if ($user->role->name === 'operator') {
                return false;
            }
        });

        Gate::define('update', function ($user, $certificate) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                return $certificate->branch_user_id === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return false;
            }
            if ($user->role->name === 'operator') {
                return false;
            }
        });

        Gate::define('create', function ($user) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                return true;
            }
            if ($user->role->name === 'user') {
                return false;
            }
            if ($user->role->name === 'operator') {
                return false;
            }
        });

        Gate::define('status-change', function ($user, $certificate) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                return $certificate->branch_user_id === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return false;
            }
            if ($user->role->name === 'operator') {
                return false;
            }
        });

        Gate::define('delete-client', function ($user, $client) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                $branch = User::find($client->user_id)->branch_id;
                return $branch === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return false;
            }
            if ($user->role->name === 'operator') {
                return false;
            }
        });

        Gate::define('delete', function ($user, $certificate) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                return $certificate->branch_user_id === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return false;
            }
            if ($user->role->name === 'operator') {
                return false;
            }
        });

        Gate::define('show', function ($user, $certificate) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                return $certificate->branch_user_id === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return $user->id === $certificate->user_id;
            }
            if ($user->role->name === 'operator') {
                return $user->id === $certificate->operator_id;
            }
        });

        Gate::define('show-client', function ($user, $client) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                $branch = User::find($client->user_id)->branch_id;
                return $branch === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return $user->id === $client->user_id;
            }
            if ($user->role->name === 'operator') {
                return $user->id === $client->operator_id;
            }
        });

        Gate::define('index', function ($user, $certificate) {
            if ($user->role->name === 'admin') {
                return true;
            }
            if ($user->role->name === 'limited_admin') {
                return $certificate->branch_user_id === $user->branch_id;
            }
            if ($user->role->name === 'user') {
                return false;
            }
            if ($user->role->name === 'operator') {
                return false;
            }
        });
    }
}
