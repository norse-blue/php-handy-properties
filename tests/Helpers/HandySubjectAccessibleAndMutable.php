<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\Helpers;

use NorseBlue\HandyProperties\HandyObject;

/**
 * @property int $value
 */
class HandySubjectAccessibleAndMutable extends HandyObject
{
    /** @var int */
    protected $value;

    public function __construct(int $value = 0)
    {
        $this->mutatorValue($value);
    }

    /**
     * @return int
     */
    protected function accessorValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return self
     */
    protected function mutatorValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
