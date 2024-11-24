<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasRolesInterface
{
    /**
     * The roles that belong to the model.
     *
     * @return MorphToMany<Role>
     */
    public function roles(): MorphToMany;

    /**
     * Assign a role to the model.
     */
    public function assignRole(string $role): void;

    /**
     * Revoke a role from the model.
     */
    public function revokeRole(string $role): void;

    /**
     * Check if the model has a role.
     */
    public function hasRole(string $role): bool;

    /**
     * Check if the model has all role.
     *
     * @param array<string> $roles
     */
    public function hasRoles(array $roles): bool;

    /**
     * Check if the model has any role.
     *
     * @param array<string> $roles
     */
    public function hasAnyRole(array $roles): bool;
}
