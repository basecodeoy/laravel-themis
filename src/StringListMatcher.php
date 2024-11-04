<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Illuminate\Support\Collection;

final readonly class StringListMatcher
{
    /**
     * @param Collection<int, string> $items
     */
    public static function one(Collection $items, string $pattern): bool
    {
        return StringMatcher::match($items, $pattern);
    }

    /**
     * @param Collection<int, string> $items
     */
    public static function many(Collection $items, array $patterns): bool
    {
        foreach ($patterns as $role) {
            if (StringMatcher::match($items, $role)) {
                continue;
            }

            return false;
        }

        return true;
    }

    /**
     * @param Collection<int, string> $items
     */
    public static function any(Collection $items, array $patterns): bool
    {
        foreach ($patterns as $role) {
            if (StringMatcher::match($items, $role)) {
                return true;
            }
        }

        return false;
    }
}
