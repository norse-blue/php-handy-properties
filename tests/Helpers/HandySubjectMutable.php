<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\Helpers;

use NorseBlue\HandyProperties\HandyObject;

/**
 * @property int $value
 */
class HandySubjectMutable extends HandyObject
{
    /** @var int */
    protected $value;

    public function __construct(int $value = 0)
    {
        $this->setValueProperty($value);
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
