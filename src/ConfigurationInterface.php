<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

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
