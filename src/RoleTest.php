<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

it('can create a role', function (): void {
    $role = Role::create(['name' => 'test']);

    expect($role->name)->toBe('test');
});

it('can retrieve the permissions that a role has', function (): void {
    Permission::create(['name' => 'test']);

    $role = Role::create(['name' => 'test']);

    expect($role->permissions()->count())->toBe(0);

    $role->assignPermission('test');

    expect($role->permissions()->count())->toBe(1);

    $role->revokePermission('test');

    expect($role->permissions()->count())->toBe(0);
});
