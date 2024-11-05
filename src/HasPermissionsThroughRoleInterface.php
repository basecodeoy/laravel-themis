<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

interface HasPermissionsThroughRoleInterface
{
    /**
     * Check if the model has a permission through a role.
     */
    public function hasPermissionThroughRole(string $permission, string $role): bool;

    /**
     * Check if the model has all of the permissions through a role.
     *
     * @param array<string> $permissions
     */
    public function hasPermissionsThroughRole(array $permissions, string $role): bool;

    /**
     * Check if the model has any of the permissions through a role.
     *
     * @param array<string> $permissions
     */
    public function hasAnyPermissionThroughRole(array $permissions, string $role): bool;
}
