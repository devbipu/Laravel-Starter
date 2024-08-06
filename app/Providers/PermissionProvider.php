<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        try {
            Gate::before(function ($user) {
                if ($user->isSuperAdmin()) {
                    return true;
                }
            });
            $permissions = Permission::get();
            $permissions->each(function ($permission) {
                $permissionLabels = array_keys($permission->values);
                foreach ($permissionLabels as $permissionLevel) {
                    $gateSlug = $permission->slug . '.' . $permissionLevel;
                    Gate::define($gateSlug, function ($user) use ($permission, $permissionLevel) {
                        return user_have_permission($permission->slug, $permissionLevel, $user->id);
                    });
                }
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
