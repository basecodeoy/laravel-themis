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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property ?Carbon $created_at
 * @property int     $id
 * @property string  $name
 * @property ?Carbon $updated_at
 */
final class Permission extends Model implements PermissionInterface
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['name'];

    /**
     * The roles that belong to the permission.
     *
     * @return BelongsToMany<Role>
     */
    public function roles(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Themis::getRoleModel(),
                Themis::getModelHasPermissionsTableName(),
                Themis::getPermissionIdColumnName(),
                Themis::getModelIdColumnName(),
            )
            ->where(
                Themis::getModelTypeColumnName(),
                Themis::getRoleModel(),
            );
    }

    /**
     * Get the table associated with the model.
     */
    public function getTable(): string
    {
        return Themis::getPermissionsTableName();
    }
}
