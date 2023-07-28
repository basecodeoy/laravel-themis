<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

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
