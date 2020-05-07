<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Support;

final class StringTransformer
{
    /**
     * Transform the given string into studly caps.
     */
    public static function studly(string $value): string
    {
        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)));
    }
}
