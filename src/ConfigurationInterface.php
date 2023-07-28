<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

interface ConfigurationInterface
{
    public function getPermissionModel(): string;

    public function getRoleModel(): string;

    public function getPermissionsTableName(): string;

    public function getRolesTableName(): string;

    public function getModelHasRolesTableName(): string;

    public function getModelHasPermissionsTableName(): string;

    public function getModelColumnName(): string;

    public function getModelIdColumnName(): string;

    public function getModelTypeColumnName(): string;

    public function getRoleIdColumnName(): string;

    public function getPermissionIdColumnName(): string;
}
