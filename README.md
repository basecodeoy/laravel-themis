## About Laravel Themis

This project was created by, and is maintained by [Brian Faust](https://github.com/faustbrian), and is an implementation of access control for Laravel, featuring robust role and permission management. Be sure to browse through the [changelog](CHANGELOG.md), [code of conduct](.github/CODE_OF_CONDUCT.md), [contribution guidelines](.github/CONTRIBUTING.md), [license](LICENSE), and [security policy](.github/SECURITY.md).

## Design

Laravel Themis is designed with a minimalist approach towards access control. It provides the essentials while maintaining an unobtrusive presence. Free from assumptions regarding usage, it offers flexibility tailored to your needs. In contrast to many other packages which tend to be highly opinionated, making assumptions that permissions and roles will be attached to authenticated entities in your applications, Laravel Themis is different.

It allows you to attach permissions and roles to any model you prefer, and even to multiple models. The provided traits can be used independently of each other, and you only need to utilize the ones necessary for your application.

A prominent feature of Laravel Themis is its simplicity. Its ease of use and comprehension make it a user-friendly tool. Moreover, it is straightforward to modify according to your requirements, which further simplifies the task of forking and adapting it to suit your needs.

## Installation

> **Note**
> This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/laravel-themis
```

You can publish the migrations by using:

```bash
$ php artisan vendor:publish --tag="laravel-themis-migrations"
```

You can publish the configuration file by using:

```bash
$ php artisan vendor:publish --tag="laravel-themis-config"
```

## Usage

> **Note**
> Please review the contents of [our test suite](/src) for detailed usage examples.

Once you've installed Laravel Themis, you need to prepare the model for which you require roles and/or permissions. You can choose from three traits and use them independently of each other:

- `HasPermissionsTrait` will add permissions to your model.
  - **This trait can be used without `HasRolesTrait`.**
- `HasPermissionsThroughRoleTrait` will add permissions to your model, provided through roles.
  - **This trait requires both `HasPermissionsTrait` and `HasRolesTrait` to be used.**
- `HasRolesTrait` will add roles to your model.
  - **This trait can be used without `HasPermissionsTrait`.**

If you want only direct roles and permissions, you can ignore `HasPermissionsThroughRoleTrait`, as this trait checks for permissions through roles rather than through direct assignments of permissions.

```diff
<?php

namespace App\Models;

+ use BombenProdukt\Themis\HasPermissionsInterface;
+ use BombenProdukt\Themis\HasPermissionsTrait;
+ use BombenProdukt\Themis\HasPermissionsThroughRoleInterface;
+ use BombenProdukt\Themis\HasPermissionsThroughRoleTrait;
+ use BombenProdukt\Themis\HasRolesInterface;
+ use BombenProdukt\Themis\HasRolesTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

- class User extends Authenticatable implements MustVerifyEmail
+ class User extends Authenticatable implements HasPermissionsInterface, HasPermissionsThroughRoleInterface, HasRolesInterface, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
+   use HasPermissionsTrait;
+   use HasPermissionsThroughRoleTrait;
    use HasProfilePhoto;
+   use HasRolesTrait;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
```

Once you've configured your model, you can start assigning, revoking, and checking permissions and roles. If you've configured your model to use `HasPermissionsThroughRoleTrait`, you can also check for permissions through roles.

| Action                         | Code                                                                                  |
| ------------------------------ | ------------------------------------------------------------------------------------- |
| Assign a permission            | `$user->assignPermission('edit articles');`                                           |
| Revoke a permission            | `$user->revokePermission('edit articles');`                                           |
| Check permission               | `$user->hasPermission('edit articles');`                                              |
| Check all permissions          | `$user->hasPermissions(['edit articles', 'delete articles']);`                        |
| Check any permission           | `$user->hasAnyPermission(['edit articles', 'delete articles']);`                      |
| Check permission via role      | `$user->hasPermissionThroughRole('edit articles', 'writer');`                         |
| Check all permissions via role | `$user->hasPermissionsThroughRole(['edit articles', 'delete articles'], 'writer');`   |
| Check any permission via role  | `$user->hasAnyPermissionThroughRole(['edit articles', 'delete articles'], 'writer');` |
| Assign a role                  | `$user->assignRole('writer');`                                                        |
| Revoke a role                  | `$user->revokeRole('writer');`                                                        |
| Check role                     | `$user->hasRole('writer');`                                                           |
| Check all roles                | `$user->hasRoles(['admin', 'writer']);`                                               |
| Check any role                 | `$user->hasAnyRole(['admin', 'writer']);`                                             |

Please note that this package does not automatically create permissions and roles for you. You need to create them yourself, just like you would with any other Eloquent model. This package provides a `Permission` and `Role` model that you can use, but feel free to create your own models if you prefer. The automatic creation of permissions and roles is not something we plan to include in this package due to the minimalistic approach we have adopted and aim to maintain.

## Alternatives

Laravel Themis is a package that aims to be minimalistic, making it easy to modify while still providing essential features. However, it might not suit everyone's needs. If you're looking for a different approach, consider checking out [Spatie's Laravel Permission](https://github.com/spatie/laravel-permission) and [Bouncer](https://github.com/JosephSilber/bouncer). Both are great packages and might be a better fit for your project due to their different approaches to access control.
