<?php

declare(strict_types=1);

namespace Tests\Models;

use BombenProdukt\Themis\HasPermissionsInterface;
use BombenProdukt\Themis\HasPermissionsThroughRoleInterface;
use BombenProdukt\Themis\HasPermissionsThroughRoleTrait;
use BombenProdukt\Themis\HasPermissionsTrait;
use BombenProdukt\Themis\HasRolesInterface;
use BombenProdukt\Themis\HasRolesTrait;
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
