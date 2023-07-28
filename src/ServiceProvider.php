<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

use BombenProdukt\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Support\Facades\Blade;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton(
            ConfigurationInterface::class,
            Configuration::class,
        );
    }

    public function packageBooted(): void
    {
        Blade::resolved(function (): void {
            $this->registerBladeDirectives();
        });
    }

    private function registerBladeDirectives(): void
    {
        Blade::if('hasPermission', function (HasPermissionsInterface $model, string $permission) {
            return $model->hasPermission($permission);
        });

        Blade::if('hasPermissions', function (HasPermissionsInterface $model, array $permissions) {
            return $model->hasPermissions($permissions);
        });

        Blade::if('hasAnyPermission', function (HasPermissionsInterface $model, array $permissions) {
            return $model->hasAnyPermission($permissions);
        });

        Blade::if('hasPermissionThroughRole', function (HasPermissionsThroughRoleInterface $model, string $permission, string $role) {
            return $model->hasPermissionThroughRole($permission, $role);
        });

        Blade::if('hasPermissionsThroughRole', function (HasPermissionsThroughRoleInterface $model, array $permissions, string $role) {
            return $model->hasPermissionsThroughRole($permissions, $role);
        });

        Blade::if('hasAnyPermissionThroughRole', function (HasPermissionsThroughRoleInterface $model, array $permissions, string $role) {
            return $model->hasAnyPermissionThroughRole($permissions, $role);
        });

        Blade::if('hasRole', function (HasRolesInterface $model, string $role) {
            return $model->hasRole($role);
        });

        Blade::if('hasRoles', function (HasRolesInterface $model, array $roles) {
            return $model->hasRoles($roles);
        });

        Blade::if('hasAnyRole', function (HasRolesInterface $model, array $roles) {
            return $model->hasAnyRole($roles);
        });
    }
}
