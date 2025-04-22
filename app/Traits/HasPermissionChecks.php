<?php

namespace App\Traits;

trait HasPermissionChecks
{
    /**
     * Check if user has any of the given permissions
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasAnyPermissionTo($permissions): bool
    {
        if (is_string($permissions)) {
            $permissions = [$permissions];
        }

        foreach ($permissions as $permission) {
            if ($this->hasPermissionTo($permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if user has all of the given permissions
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasAllPermissionsTo($permissions): bool
    {
        if (is_string($permissions)) {
            $permissions = [$permissions];
        }

        foreach ($permissions as $permission) {
            if (!$this->hasPermissionTo($permission)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if user has permission for specific module
     *
     * @param string $module
     * @param string $action
     * @return bool
     */
    public function canAccess(string $module, string $action): bool
    {
        return $this->hasPermissionTo("$action $module");
    }
} 