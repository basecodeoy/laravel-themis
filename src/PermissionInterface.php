<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

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
