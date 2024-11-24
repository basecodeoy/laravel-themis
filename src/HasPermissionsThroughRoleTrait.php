<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

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
