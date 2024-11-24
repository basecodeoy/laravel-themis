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

final readonly class HasAnyPermissionThroughRoleMiddleware
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, \Closure $next, string $role, string ...$permissions): Response
    {
        /** @var HasPermissionsThroughRoleInterface $user */
        $user = $request->user();

        abort_unless($user->hasAnyPermissionThroughRole($permissions, $role), 403);

        return $next($request);
    }
}
