<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasRolesTrait
{
    /**
     * @return MorphToMany<Role>
     */
    public function roles(): MorphToMany
    {
        return $this->morphToMany(
            Themis::getRoleModel(),
            Themis::getModelColumnName(),
            Themis::getModelHasRolesTableName(),
            Themis::getModelIdColumnName(),
            Themis::getRoleIdColumnName(),
        );
    }

    public function assignRole(string $role): void
    {
        $this->roles()->attach(ModelFinder::role($role));
    }

    public function revokeRole(string $role): void
    {
        $this->roles()->detach(ModelFinder::role($role));
    }

    public function hasRole(string $role): bool
    {
        return StringListMatcher::one($this->roles()->pluck('name'), $role);
    }

    public function hasRoles(array $roles): bool
    {
        return StringListMatcher::many($this->roles()->pluck('name'), $roles);
    }

    public function hasAnyRole(array $roles): bool
    {
        return StringListMatcher::any($this->roles()->pluck('name'), $roles);
    }
}
