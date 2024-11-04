<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Tests\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function (): void {
    Route::get('/middleware', fn () => Response::noContent())
        ->middleware(HasPermissionsThroughRoleMiddleware::class.':writer,edit articles,delete articles');

    Permission::create(['name' => 'edit articles']);
    Permission::create(['name' => 'delete articles']);
});

it('allows access if the user has the required permissions', function (): void {
    actingAs(User::factory()->withRole('writer')->create());

    Role::where('name', 'writer')->firstOrFail()->assignPermission('edit articles');
    Role::where('name', 'writer')->firstOrFail()->assignPermission('delete articles');

    get('/middleware')->assertNoContent();
});

it('aborts request if the user does not have the required permissions', function (): void {
    actingAs(User::factory()->withRole('writer')->create());

    get('/middleware')->assertForbidden();
});
