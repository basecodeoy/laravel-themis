<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getModelColumnName()
 * @method static string getModelHasPermissionsTableName()
 * @method static string getModelHasRolesTableName()
 * @method static string getModelIdColumnName()
 * @method static string getModelTypeColumnName()
 * @method static string getPermissionIdColumnName()
 * @method static string getPermissionModel()
 * @method static string getPermissionsTableName()
 * @method static string getRoleIdColumnName()
 * @method static string getRoleModel()
 * @method static string getRolesTableName()
 */
final class Themis extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ConfigurationInterface::class;
    }
}
