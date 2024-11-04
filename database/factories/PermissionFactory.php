<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis\Database\Factories;

use BaseCodeOy\Themis\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Permission>
 */
final class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    public function definition()
    {
        return [
            //
        ];
    }
}
