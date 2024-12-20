<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

it('can create a permission', function (): void {
    $permission = Permission::create(['name' => 'test']);

    expect($permission->name)->toBe('test');
});

it('can retrieve the roles that a permission belongs to', function (): void {
    $permission = Permission::create(['name' => 'test']);
    $role = Role::create(['name' => 'test']);

    expect($permission->roles()->count())->toBe(0);

    $role->assignPermission('test');

    expect($permission->roles()->count())->toBe(1);

    $role->revokePermission('test');

    expect($permission->roles()->count())->toBe(0);
});
