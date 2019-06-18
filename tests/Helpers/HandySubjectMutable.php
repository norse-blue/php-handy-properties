<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\Helpers;

use NorseBlue\HandyProperties\HandyObject;

/**
 * @property-write int $value
 */
class HandySubjectMutable extends HandyObject
{
    /** @var int */
    protected $value;

    public function __construct(int $value = 0)
    {
        $this->mutatorValue($value);
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
