<?php

declare(strict_types=1);

namespace BombenProdukt\Themis\Database\Factories;

use BombenProdukt\Themis\Permission;
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
