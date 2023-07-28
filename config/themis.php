<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Themis Models
    |--------------------------------------------------------------------------
    |
    | This array contains the class names of the Eloquent models used by Themis.
    | These models will be used when querying and persisting permissions and roles.
    |
    */

    'models' => [
        /*
        |--------------------------------------------------------------------------
        | Permission Model
        |--------------------------------------------------------------------------
        |
        | This is the Eloquent model used for permissions. This class will be used
        | when performing permission related queries and should extend
        | 'Illuminate\Database\Eloquent\Model'.
        |
        */

        'permission' => \BombenProdukt\Themis\Permission::class,

        /*
        |--------------------------------------------------------------------------
        | Role Model
        |--------------------------------------------------------------------------
        |
        | This is the Eloquent model used for roles. This class will be used
        | when performing role related queries and should extend
        | 'Illuminate\Database\Eloquent\Model'.
        |
        */

        'role' => \BombenProdukt\Themis\Role::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Themis Tables
    |--------------------------------------------------------------------------
    |
    | This array contains the names of the database tables used by Themis.
    | If you have changed the table names in your migrations, adjust these settings to match.
    |
    */

    'tables' => [
        /*
        |--------------------------------------------------------------------------
        | Permissions Table
        |--------------------------------------------------------------------------
        |
        | This is the table used to store permissions.
        |
        */

        'permissions' => 'permissions',

        /*
        |--------------------------------------------------------------------------
        | Roles Table
        |--------------------------------------------------------------------------
        |
        | This is the table used to store roles.
        |
        */

        'roles' => 'roles',

        /*
        |--------------------------------------------------------------------------
        | Roles Association Table
        |--------------------------------------------------------------------------
        |
        | This is the pivot table used to associate roles with models.
        |
        */

        'model_has_roles' => 'model_has_roles',

        /*
        |--------------------------------------------------------------------------
        | Permissions Association Table
        |--------------------------------------------------------------------------
        |
        | This is the pivot table used to associate permissions with models.
        |
        */

        'model_has_permissions' => 'model_has_permissions',
    ],

    /*
    |--------------------------------------------------------------------------
    | Themis Columns
    |--------------------------------------------------------------------------
    |
    | This array contains the column names used by Themis in the database tables.
    | If you have changed the column names in your migrations, adjust these settings to match.
    |
    */

    'columns' => [
        /*
        |--------------------------------------------------------------------------
        | Model Column
        |--------------------------------------------------------------------------
        |
        | This is the column used to store the model identifier.
        |
        */

        'model' => 'model',

        /*
        |--------------------------------------------------------------------------
        | Role ID Column
        |--------------------------------------------------------------------------
        |
        | This is the column used to store the role identifiers.
        |
        */

        'role_id' => 'role_id',

        /*
        |--------------------------------------------------------------------------
        | Permission ID Column
        |--------------------------------------------------------------------------
        |
        | This is the column used to store the permission identifiers.
        |
        */

        'permission_id' => 'permission_id',
    ],
];
