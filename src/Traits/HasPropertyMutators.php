<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Traits;

use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;
use NorseBlue\HandyProperties\Support\Transformer;

/**
 * Handles property mutators.
 */
trait HasPropertyMutators
{
    /**
     * Checks if a mutator exists for the key.
     *
     * @param string $key
     * @param string|null $mutator optional Output parameter to get the mutator name.
     *
     * @return bool
     */
    protected function hasMutator(string $key, ?string &$mutator = null): bool
    {
        $studly_key = Transformer::studly($key);
        $mutator = 'mutator' . $studly_key;

        return method_exists($this, $mutator);
    }

    /**
     * Magic mutator.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return mixed
     */
    public function __set(string $key, $value)
    {
        if ($this->hasMutator($key, $mutator)) {
            return $this->$mutator($value);
        }

        throw new PropertyNotMutableException($key, 'The property is not mutable.');
    }
}
