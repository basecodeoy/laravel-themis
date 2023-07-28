<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class HasPermissionMiddleware
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        /** @var HasPermissionsInterface $user */
        $user = $request->user();

        abort_unless($user->hasPermission($permission), 403);

        return $next($request);
    }
}
