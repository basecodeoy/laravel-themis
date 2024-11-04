<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Illuminate\Support\Facades\Config;
use TypeError;

final class Configuration implements ConfigurationInterface
{
    public function getPermissionModel(): string
    {
        return $this->getStringValue('themis.models.permission');
    }

    public function getRoleModel(): string
    {
        return $this->getStringValue('themis.models.role');
    }

    public function getPermissionsTableName(): string
    {
        return $this->getStringValue('themis.tables.permissions');
    }

    public function getRolesTableName(): string
    {
        return $this->getStringValue('themis.tables.roles');
    }

    public function getModelHasRolesTableName(): string
    {
        return $this->getStringValue('themis.tables.model_has_roles');
    }

    public function getModelHasPermissionsTableName(): string
    {
        return $this->getStringValue('themis.tables.model_has_permissions');
    }

    public function getModelColumnName(): string
    {
        return $this->getStringValue('themis.columns.model');
    }

    public function getModelIdColumnName(): string
    {
        return $this->getModelColumnName().'_id';
    }

    public function getModelTypeColumnName(): string
    {
        return $this->getModelColumnName().'_type';
    }

    public function getRoleIdColumnName(): string
    {
        return $this->getStringValue('themis.columns.role_id');
    }

    public function getPermissionIdColumnName(): string
    {
        return $this->getStringValue('themis.columns.permission_id');
    }

    private function getStringValue(string $key): string
    {
        $value = Config::get($key);

        if (\is_string($value)) {
            return $value;
        }

        throw new TypeError("Configuration value '{$key}' must be a string.");
    }
}
