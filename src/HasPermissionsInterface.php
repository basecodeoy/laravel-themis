<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasPermissionsInterface
{
    /**
     * The permissions that belong to the model.
     *
     * @return MorphToMany<Permission>
     */
    public function permissions(): MorphToMany;

    /**
     * Assign a permission to the model.
     */
    public function assignPermission(string $permission): void;

    /**
     * Revoke a permission from the model.
     */
    public function revokePermission(string $permission): void;

    /**
     * Check if the model has a permission.
     */
    public function hasPermission(string $permission): bool;

    /**
     * Check if the model has all of the permissions.
     *
     * @param array<string> $permissions
     */
    public function hasPermissions(array $permissions): bool;

    /**
     * Check if the model has any of the permissions.
     *
     * @param array<string> $permissions
     */
    public function hasAnyPermission(array $permissions): bool;
}
