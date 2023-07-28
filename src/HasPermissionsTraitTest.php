<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

it('can attach and detach a permission to a model', function (): void {
    Permission::create(['name' => 'edit articles']);

    /** @var HasPermissionsInterface $writer */
    $writer = Role::create(['name' => 'writer']);

    expect($writer->permissions()->count())->toBe(0);

    $writer->assignPermission('edit articles');

    expect($writer->permissions()->count())->toBe(1);

    $writer->revokePermission('edit articles');

    expect($writer->permissions()->count())->toBe(0);
});

it('can check if the model has a permission', function (): void {
    Permission::create(['name' => 'edit articles']);

    $writer = Role::create(['name' => 'writer']);

    expect($writer->hasPermission('edit articles'))->toBeFalse();

    $writer->assignPermission('edit articles');

    expect($writer->hasPermission('edit articles'))->toBeTrue();

    $writer->revokePermission('edit articles');

    expect($writer->hasPermission('edit articles'))->toBeFalse();
});

it('can check if the model has a permission (WILDCARD)', function (): void {
    Permission::create(['name' => 'edit articles']);

    $writer = Role::create(['name' => 'writer']);

    expect($writer->hasPermission('edit *'))->toBeFalse();

    $writer->assignPermission('edit articles');

    expect($writer->hasPermission('edit *'))->toBeTrue();

    $writer->revokePermission('edit articles');

    expect($writer->hasPermission('edit *'))->toBeFalse();
});

it('can check if the model has any permissions', function (): void {
    Permission::create(['name' => 'edit articles']);

    /** @var HasPermissionsInterface $writer */
    $writer = Role::create(['name' => 'writer']);

    expect($writer->hasAnyPermission(['edit articles']))->toBeFalse();

    $writer->assignPermission('edit articles');

    expect($writer->hasAnyPermission(['edit articles']))->toBeTrue();

    $writer->revokePermission('edit articles');

    expect($writer->hasAnyPermission(['edit articles']))->toBeFalse();
});

it('can check if the model has any permissions (WILDCARD)', function (): void {
    Permission::create(['name' => 'edit articles']);

    /** @var HasPermissionsInterface $writer */
    $writer = Role::create(['name' => 'writer']);

    expect($writer->hasAnyPermission(['edit *']))->toBeFalse();

    $writer->assignPermission('edit articles');

    expect($writer->hasAnyPermission(['edit *']))->toBeTrue();

    $writer->revokePermission('edit articles');

    expect($writer->hasAnyPermission(['edit *']))->toBeFalse();
});

it('can check if the model has all permissions', function (): void {
    Permission::create(['name' => 'edit articles']);
    Permission::create(['name' => 'delete articles']);

    /** @var HasPermissionsInterface $writer */
    $writer = Role::create(['name' => 'writer']);

    expect($writer->hasPermissions(['edit articles']))->toBeFalse();
    expect($writer->hasPermissions(['edit articles', 'delete articles']))->toBeFalse();

    $writer->assignPermission('edit articles');

    expect($writer->hasPermissions(['edit articles']))->toBeTrue();
    expect($writer->hasPermissions(['edit articles', 'delete articles']))->toBeFalse();

    $writer->assignPermission('delete articles');

    expect($writer->hasPermissions(['edit articles']))->toBeTrue();
    expect($writer->hasPermissions(['edit articles', 'delete articles']))->toBeTrue();
});

it('can check if the model has all permissions (WILDCARD)', function (): void {
    Permission::create(['name' => 'edit articles']);
    Permission::create(['name' => 'delete articles']);

    /** @var HasPermissionsInterface $writer */
    $writer = Role::create(['name' => 'writer']);

    expect($writer->hasPermissions(['edit articles']))->toBeFalse();
    expect($writer->hasPermissions(['edit articles', 'delete *']))->toBeFalse();

    $writer->assignPermission('edit articles');

    expect($writer->hasPermissions(['edit articles']))->toBeTrue();
    expect($writer->hasPermissions(['edit articles', 'delete *']))->toBeFalse();

    $writer->assignPermission('delete articles');

    expect($writer->hasPermissions(['edit articles']))->toBeTrue();
    expect($writer->hasPermissions(['edit articles', 'delete *']))->toBeTrue();
});
