<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Tests\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function (): void {
    Route::get('/middleware', fn () => Response::noContent())
        ->middleware(HasPermissionMiddleware::class.':edit articles');
});

it('allows access if the user has the required role', function (): void {
    actingAs(User::factory()->withPermission('edit articles')->create());

    get('/middleware')->assertNoContent();
});

it('aborts request if the user does not have the required role', function (): void {
    actingAs(User::factory()->withPermission('delete articles')->create());

    get('/middleware')->assertForbidden();
});
