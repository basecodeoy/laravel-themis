<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Tests\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function (): void {
    Route::get('/middleware', fn () => Response::noContent())
        ->middleware(HasRolesMiddleware::class.':admin,writer');
});

it('allows access if the user has the required roles', function (): void {
    actingAs(User::factory()->withRoles(['admin', 'writer'])->create());

    get('/middleware')->assertNoContent();
});

it('aborts request if the user does not have the required roles', function (): void {
    actingAs(User::factory()->withRole('admin')->create());

    get('/middleware')->assertForbidden();
});
