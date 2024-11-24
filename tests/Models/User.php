<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Models;

use BaseCodeOy\Themis\HasPermissionsInterface;
use BaseCodeOy\Themis\HasPermissionsThroughRoleInterface;
use BaseCodeOy\Themis\HasPermissionsThroughRoleTrait;
use BaseCodeOy\Themis\HasPermissionsTrait;
use BaseCodeOy\Themis\HasRolesInterface;
use BaseCodeOy\Themis\HasRolesTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Auth;

final class User extends Auth implements HasPermissionsInterface, HasPermissionsThroughRoleInterface, HasRolesInterface
{
    use HasFactory;
    use HasPermissionsTrait;
    use HasPermissionsThroughRoleTrait;
    use HasRolesTrait;

    protected $guarded = [];

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
