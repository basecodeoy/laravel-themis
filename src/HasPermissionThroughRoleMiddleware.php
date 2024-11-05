<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class HasPermissionThroughRoleMiddleware
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $role, string $permission): Response
    {
        /** @var HasPermissionsThroughRoleInterface $user */
        $user = $request->user();

        abort_unless($user->hasPermissionThroughRole($permission, $role), 403);

        return $next($request);
    }
}
