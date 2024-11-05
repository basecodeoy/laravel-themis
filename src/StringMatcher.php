<?php

declare(strict_types=1);

namespace BaseCodeOy\Themis;

use Illuminate\Support\Collection;

final readonly class StringMatcher
{
    /**
     * @param Collection<int, string> $items
     */
    public static function match(Collection $items, string $pattern): bool
    {
        if (\str_contains($pattern, '*')) {
            return $items->contains(fn (string $item): bool => \fnmatch($pattern, $item));
        }

        return $items->contains($pattern);
    }
}
