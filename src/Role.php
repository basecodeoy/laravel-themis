<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Carbon $created_at
 * @property int     $id
 * @property string  $name
 * @property ?Carbon $updated_at
 */
final class Role extends Model implements HasPermissionsInterface, RoleInterface
{
    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['name'];

    /**
     * Get the table associated with the model.
     */
    public function getTable(): string
    {
        return Themis::getRolesTableName();
    }
}
