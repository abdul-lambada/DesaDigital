<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        // Register middleware
        $this->app['router']->aliasMiddleware('permission', \Spatie\Permission\Middleware\PermissionMiddleware::class);
        $this->app['router']->aliasMiddleware('role', \Spatie\Permission\Middleware\RoleMiddleware::class);
        $this->app['router']->aliasMiddleware('role_or_permission', \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class);

        // Register model bindings
        $this->app->bind(Permission::class, function ($app) {
            return new Permission();
        });

        $this->app->bind(Role::class, function ($app) {
            return new Role();
        });

        // Blade directive for checking permissions
        Blade::directive('permission', function ($expression) {
            return "<?php if(auth()->check() && auth()->user()->hasPermissionTo({$expression})): ?>";
        });
        Blade::directive('endpermission', function () {
            return "<?php endif; ?>";
        });

        // Blade directive for checking any permissions
        Blade::directive('anypermission', function ($expression) {
            return "<?php if(auth()->check() && auth()->user()->hasAnyPermission({$expression})): ?>";
        });
        Blade::directive('endanypermission', function () {
            return "<?php endif; ?>";
        });

        // Blade directive for checking all permissions
        Blade::directive('allpermissions', function ($expression) {
            return "<?php if(auth()->check() && auth()->user()->hasAllPermissions({$expression})): ?>";
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
