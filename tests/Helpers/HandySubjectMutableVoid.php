<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\Helpers;

use NorseBlue\HandyProperties\HandyObject;

/**
 * @property-write int $value
 */
class HandySubjectMutableVoid extends HandyObject
{
    /** @var int */
    protected $value;

    public function __construct(int $value = 0)
    {
        $this->setValueProperty($value);
    }

    /**
     * @param int $value
     */
    protected function setValueProperty(int $value)
    {
        $this->value = $value;
    }
}
