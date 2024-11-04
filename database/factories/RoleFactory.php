<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis\Database\Factories;

use BaseCodeOy\Themis\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Role>
 */
final class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
            //
        ];
    }
}
