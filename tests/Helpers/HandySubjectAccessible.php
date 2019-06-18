<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\Helpers;

use Exception;
use NorseBlue\HandyProperties\HandyObject;

/**
 * @property-read bool $odd True if the value is odd, false otherwise.
 * @property-read int $random_int Random integer between 0 and 9 that does not repeat.
 * @property-read int $value
 */
class HandySubjectAccessible extends HandyObject
{
    /** @var int */
    protected $value;

    /** @var int */
    protected $random = null;

    public function __construct(int $value = 0)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    protected function accessorValue(): int
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    protected function accessorOdd(): bool
    {
        return $this->value % 2 !== 0;
    }

    /**
     * @return int
     *
     * @throws Exception
     */
    protected function accessorRandomInt(): int
    {
        do {
            $new_random = random_int(0, 9);
        } while ($new_random === $this->random);

        return $this->random = $new_random;
    }
}
