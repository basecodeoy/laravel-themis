<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Tests\Models\User;

it('can attach and detach a roles to a model', function (): void {
    Role::create(['name' => 'writer']);

    /** @var HasRolesInterface $writer */
    $user = User::factory()->create();

    expect($user->roles()->count())->toBe(0);

    $user->assignRole('writer');

    expect($user->roles()->count())->toBe(1);

    $user->revokeRole('writer');

    expect($user->roles()->count())->toBe(0);
});

it('can check if the model has a role', function (): void {
    Role::create(['name' => 'writer']);

    /** @var HasRolesInterface $user */
    $user = User::factory()->create();

    expect($user->hasRole('writer'))->toBeFalse();

    $user->assignRole('writer');

    expect($user->hasRole('writer'))->toBeTrue();

    $user->revokeRole('writer');

    expect($user->hasRole('writer'))->toBeFalse();
});

it('can check if the model has a role (WILDCARD)', function (): void {
    Role::create(['name' => 'writer']);

    /** @var HasRolesInterface $user */
    $user = User::factory()->create();

    expect($user->hasRole('wri*'))->toBeFalse();

    $user->assignRole('writer');

    expect($user->hasRole('wri*'))->toBeTrue();

    $user->revokeRole('writer');

    expect($user->hasRole('wri*'))->toBeFalse();
});

it('can check if the model has a permission through a role', function (): void {
    Permission::create(['name' => 'edit articles']);

    /** @var HasPermissionsInterface $role */
    $role = Role::create(['name' => 'writer']);

    /** @var HasPermissionsInterface|HasRolesInterface $user */
    $user = User::factory()->create();
    $user->assignRole('writer');

    expect($user->hasPermission('edit articles'))->toBeFalse();
    expect($user->hasPermissionThroughRole('edit articles', 'writer'))->toBeFalse();

    $role->assignPermission('edit articles');

    expect($user->hasPermission('edit articles'))->toBeFalse();
    expect($user->hasPermissionThroughRole('edit articles', 'writer'))->toBeTrue();

    $role->revokePermission('edit articles');

    expect($user->hasPermission('edit articles'))->toBeFalse();
    expect($user->hasPermissionThroughRole('edit articles', 'writer'))->toBeFalse();
});

it('can check if the model has any roles', function (): void {
    Role::create(['name' => 'writer']);

    /** @var HasRolesInterface $user */
    $user = User::factory()->create();

    expect($user->hasAnyRole(['admin', 'writer']))->toBeFalse();

    $user->assignRole('writer');

    expect($user->hasAnyRole(['admin', 'writer']))->toBeTrue();

    $user->revokeRole('writer');

    expect($user->hasAnyRole(['admin', 'writer']))->toBeFalse();
});

it('can check if the model has any roles (WILDCARD)', function (): void {
    Role::create(['name' => 'writer']);

    /** @var HasRolesInterface $user */
    $user = User::factory()->create();

    expect($user->hasAnyRole(['admin', 'wri*']))->toBeFalse();

    $user->assignRole('writer');

    expect($user->hasAnyRole(['admin', 'wri*']))->toBeTrue();

    $user->revokeRole('writer');

    expect($user->hasAnyRole(['admin', 'wri*']))->toBeFalse();
});

it('can check if the model has all roles', function (): void {
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'writer']);

    /** @var HasRolesInterface $user */
    $user = User::factory()->create();

    expect($user->hasRoles(['admin', 'writer']))->toBeFalse();

    $user->assignRole('writer');

    expect($user->hasRoles(['admin', 'writer']))->toBeFalse();

    $user->assignRole('admin');

    expect($user->hasRoles(['admin', 'writer']))->toBeTrue();
});

it('can check if the model has all roles (WILDCARD)', function (): void {
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'writer']);

    /** @var HasRolesInterface $user */
    $user = User::factory()->create();

    expect($user->hasRoles(['admin', 'wri*']))->toBeFalse();

    $user->assignRole('writer');

    expect($user->hasRoles(['admin', 'wri*']))->toBeFalse();

    $user->assignRole('admin');

    expect($user->hasRoles(['admin', 'wri*']))->toBeTrue();
});
