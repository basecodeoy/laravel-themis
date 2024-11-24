<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

final readonly class ModelFinder
{
    public static function role(string $role): Role
    {
        $roleModel = Themis::getRoleModel();

        return $roleModel::where('name', $role)->firstOrFail();
    }

    public static function roleThroughModel(string $role, HasRolesInterface $model): Role
    {
        return $model->roles()->where('name', $role)->firstOrFail();
    }

    public static function permission(string $permission): Permission
    {
        $permissionModel = Themis::getPermissionModel();

        return $permissionModel::where('name', $permission)->firstOrFail();
    }

    public static function permissionThroughModel(string $permission, HasPermissionsInterface $model): Permission
    {
        return $model->permissions()->where('name', $permission)->firstOrFail();
    }
}
