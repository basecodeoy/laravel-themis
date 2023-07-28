<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

trait HasPermissionsThroughRoleTrait
{
    public function hasPermissionThroughRole(string $permission, string $role): bool
    {
        return PermissionMatcher::hasOne(
            ModelFinder::roleThroughModel($role, $this),
            $permission,
        );
    }

    public function hasPermissionsThroughRole(array $permissions, string $role): bool
    {
        return PermissionMatcher::hasMany(
            ModelFinder::roleThroughModel($role, $this),
            $permissions,
        );
    }

    public function hasAnyPermissionThroughRole(array $permissions, string $role): bool
    {
        return PermissionMatcher::hasAny(
            ModelFinder::roleThroughModel($role, $this),
            $permissions,
        );
    }
}
