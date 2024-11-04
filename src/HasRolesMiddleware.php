<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class HasRolesMiddleware
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        /** @var HasRolesInterface $user */
        $user = $request->user();

        abort_unless($user->hasRoles($roles), 403);

        return $next($request);
    }
}
