<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        // Blade directive for checking permissions
        Blade::directive('permission', function ($expression) {
            return "<?php if(auth()->check() && auth()->user()->hasPermissionTo({$expression})): ?>";
        });
        Blade::directive('endpermission', function () {
            return "<?php endif; ?>";
        });

        // Blade directive for checking any permissions
        Blade::directive('anypermission', function ($expression) {
            return "<?php if(auth()->check() && auth()->user()->hasAnyPermissionTo({$expression})): ?>";
        });
        Blade::directive('endanypermission', function () {
            return "<?php endif; ?>";
        });

        // Blade directive for checking all permissions
        Blade::directive('allpermissions', function ($expression) {
            return "<?php if(auth()->check() && auth()->user()->hasAllPermissionsTo({$expression})): ?>";
        });
        Blade::directive('endallpermissions', function () {
            return "<?php endif; ?>";
        });

        // Blade directive for checking module access
        Blade::directive('canaccess', function ($expression) {
            $args = array_map('trim', explode(',', $expression));
            return "<?php if(auth()->check() && auth()->user()->canAccess({$args[0]}, {$args[1]})): ?>";
        });
        Blade::directive('endcanaccess', function () {
            return "<?php endif; ?>";
        });
    }
} 