<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Themis;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class HasPermissionsMiddleware
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, \Closure $next, string ...$permissions): Response
    {
        /** @var HasPermissionsInterface $user */
        $user = $request->user();

        abort_unless($user->hasPermissions($permissions), 403);

        return $next($request);
    }
}
