<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Support;

final class StringTransformer
{
    /**
     * Transform the given string into camel case.
     */
    public static function camel(string $value): string
    {
        return lcfirst(self::studly($value));
    }

    /**
     * Transform the given string into studly case.
     */
    public static function studly(string $value): string
    {
        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)));
    }


}
