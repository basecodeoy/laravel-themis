<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
