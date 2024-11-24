<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
