<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Traits;

use NorseBlue\HandyProperties\Support\Transformer;

trait BuildsMethodName
{
    /**
     * Resolve
     * @param string $key
     * @param string $type
     *
     * @return string
     */
    final protected function buildMethodName(string $key, string $type): string
    {
        $studly_key = Transformer::studly($key);

        return strtolower($type) . $studly_key;
    }
}
