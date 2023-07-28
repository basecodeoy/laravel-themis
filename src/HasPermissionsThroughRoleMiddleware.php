<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class HasPermissionsThroughRoleMiddleware
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $role, string ...$permissions): Response
    {
        /** @var HasPermissionsThroughRoleInterface $user */
        $user = $request->user();

        abort_unless($user->hasPermissionsThroughRole($permissions, $role), 403);

        return $next($request);
    }
}
