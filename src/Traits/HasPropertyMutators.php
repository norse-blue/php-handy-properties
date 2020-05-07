<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Traits;

use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;

/**
 * Handles property mutators.
 */
trait HasPropertyMutators
{
    use BuildsMethodName;

    /**
     * Magic mutator.
     *
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

    /**
     * Checks if a mutator exists for the key.
     *
     * @param string|null $mutator optional Output parameter to get the mutator name.
     */
    final protected function hasMutator(string $key, ?string &$mutator = null): bool
    {
        $mutator = $this->buildMethodName($key, 'mutator');

        return method_exists($this, $mutator);
    }
}
