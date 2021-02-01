<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Traits;

use NorseBlue\HandyProperties\Support\StringTransformer;

trait BuildsMethodName
{
    /**
     * Builds the method name.
     */
    final protected function buildMethodName(string $key, string $prefix, string $suffix = ''): string
    {
        return StringTransformer::camel(StringTransformer::studly($prefix) . StringTransformer::studly($key) . StringTransformer::studly($suffix));
    }
}
