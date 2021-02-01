<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\Helpers;

use NorseBlue\HandyProperties\HandyObject;

/**
 * @property int $value
 */
class HandySubjectCustomAccessibleAndMutable extends HandyObject
{
    /** @var int */
    protected $value;

    protected string $handyPropertyAccessorPrefix = 'get';
    protected string $handyPropertyAccessorSuffix = 'Attribute';
    protected string $handyPropertyMutatorPrefix = 'set';
    protected string $handyPropertyMutatorSuffix = 'Property';

    public function __construct(int $value = 0)
    {
        $this->setValueProperty($value);
    }

    /**
     * @return int
     */
    protected function getValueAttribute(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return self
     */
    protected function setValueProperty(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
