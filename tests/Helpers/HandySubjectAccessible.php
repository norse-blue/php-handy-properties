<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\Helpers;

use NorseBlue\HandyProperties\HandyObject;

/**
 * @property int $value
 */
class HandySubjectAccessible extends HandyObject
{
    /** @var int */
    protected $value;

    public function __construct(int $value = 0)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    protected function getValueProperty()
    {
        return $this->value;
    }
}
