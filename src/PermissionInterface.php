<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property ?Carbon $created_at
 * @property int     $id
 * @property string  $name
 * @property ?Carbon $updated_at
 *
 * @mixin Permission
 */
interface PermissionInterface
{
    /**
     * The roles that belong to the permission.
     *
     * @return BelongsToMany<RoleInterface>
     */
    public function roles(): BelongsToMany;
}
