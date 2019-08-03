<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Traits;

use NorseBlue\HandyProperties\Support\StringTransformer;

trait BuildsMethodName
{
    /**
     * Builds the method name.
     *
     * @param string $key
     * @param string $type
     *
     * @return string
     */
    final protected function buildMethodName(string $key, string $type): string
    {
        $studly_key = StringTransformer::studly($key);

        return strtolower($type) . $studly_key;
    }
}
