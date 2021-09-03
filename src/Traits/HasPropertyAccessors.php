<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Traits;

use NorseBlue\HandyProperties\Exceptions\PropertyNotAccessibleException;

/**
 * Handles property accessors.
 */
trait HasPropertyAccessors
{
    use BuildsMethodName;

    protected string $handyPropertyAccessorPrefix = 'accessor';
    protected string $handyPropertyAccessorSuffix = '';

    /**
     * Magic accessor.
     *
     * @noinspection MagicMethodsValidityInspection
     */
    public function __get(string $key): mixed
    {
        if ($this->hasAccessor($key, $accessor)) {
            return $this->$accessor();
        }

        throw new PropertyNotAccessibleException($key, 'The property is not accessible.');
    }

    /**
     * Magic variable set check.
     *
     * @noinspection MagicMethodsValidityInspection
     */
    public function __isset(string $key): bool
    {
        $value = $this->__get($key);

        return isset($value);
    }

    /**
     * Checks if an accessor exists for the key.
     *
     * @param string|null $accessor optional Output parameter to get the accessor name.
     */
    final protected function hasAccessor(string $key, ?string &$accessor = null): bool
    {
        $accessor = $this->buildMethodName($key, $this->handyPropertyAccessorPrefix, $this->handyPropertyAccessorSuffix);

        return method_exists($this, $accessor);
    }
}
