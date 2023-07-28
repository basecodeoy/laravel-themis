<?php

declare(strict_types=1);

namespace BombenProdukt\Themis;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class HasAnyRoleMiddleware
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        /** @var HasRolesInterface $user */
        $user = $request->user();

        abort_unless($user->hasAnyRole($roles), 403);

        return $next($request);
    }
}
