<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property Collection<int, Permission> $permissions
 */
trait HasPermissionsTrait
{
    /**
     * @return MorphToMany<Permission>
     */
    public function permissions(): MorphToMany
    {
        return $this->morphToMany(
            Themis::getPermissionModel(),
            Themis::getModelColumnName(),
            Themis::getModelHasPermissionsTableName(),
            Themis::getModelIdColumnName(),
            Themis::getPermissionIdColumnName(),
        );
    }

    public function assignPermission(string $permission): void
    {
        $this->permissions()->attach(ModelFinder::permission($permission));
    }

    public function revokePermission(string $permission): void
    {
        $this->permissions()->detach(ModelFinder::permission($permission));
    }

    public function hasPermission(string $permission): bool
    {
        return PermissionMatcher::hasOne($this, $permission);
    }

    public function hasPermissions(array $permissions): bool
    {
        return PermissionMatcher::hasMany($this, $permissions);
    }

    public function hasAnyPermission(array $permissions): bool
    {
        return PermissionMatcher::hasAny($this, $permissions);
    }
}
