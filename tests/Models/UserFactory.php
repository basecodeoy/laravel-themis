<?php

declare(strict_types=1);

namespace Tests\Models;

use BaseCodeOy\Themis\Permission;
use BaseCodeOy\Themis\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function withRole(string $name): self
    {
        return $this->afterCreating(function (User $user) use ($name): void {
            Role::firstOrCreate(['name' => $name]);

            $user->assignRole($name);
        });
    }

    public function withRoles(array $roles): self
    {
        return $this->afterCreating(function (User $user) use ($roles): void {
            foreach ($roles as $role) {
                Role::firstOrCreate(['name' => $role]);

                $user->assignRole($role);
            }
        });
    }

    public function withPermission(string $name): self
    {
        return $this->afterCreating(function (User $user) use ($name): void {
            Permission::firstOrCreate(['name' => $name]);

            $user->assignPermission($name);
        });
    }

    public function withPermissions(array $permissions): self
    {
        return $this->afterCreating(function (User $user) use ($permissions): void {
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);

                $user->assignPermission($permission);
            }
        });
    }
}
