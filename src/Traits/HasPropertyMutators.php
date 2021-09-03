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

    protected string $handyPropertyMutatorPrefix = 'mutator';
    protected string $handyPropertyMutatorSuffix = '';

    /**
     * Magic mutator.
     *
     * @noinspection MagicMethodsValidityInspection
     */
    public function __set(string $key, mixed $value): void
    {
        if ($this->hasMutator($key, $mutator)) {
            $this->$mutator($value);
            return;
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
        $mutator = $this->buildMethodName($key, $this->handyPropertyMutatorPrefix, $this->handyPropertyMutatorSuffix);

        return method_exists($this, $mutator);
    }
}
