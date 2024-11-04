<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

final readonly class PermissionMatcher
{
    public static function hasOne(HasPermissionsInterface $model, string $permission): bool
    {
        return StringListMatcher::one($model->permissions()->pluck('name'), $permission);
    }

    public static function hasMany(HasPermissionsInterface $model, array $permissions): bool
    {
        return StringListMatcher::many($model->permissions()->pluck('name'), $permissions);
    }

    public static function hasAny(HasPermissionsInterface $model, array $permissions): bool
    {
        return StringListMatcher::any($model->permissions()->pluck('name'), $permissions);
    }
}
