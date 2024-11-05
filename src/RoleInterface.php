<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property ?Carbon $created_at
 * @property int     $id
 * @property string  $name
 * @property ?Carbon $updated_at
 *
 * @mixin Role
 */
interface RoleInterface
{
    /**
     * The roles that belong to the permission.
     *
     * @return MorphToMany<PermissionInterface>
     */
    public function permissions(): MorphToMany;
}
