<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\HandyObject;

use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectAccessible;
use NorseBlue\HandyProperties\Tests\TestCase;

class IssetPropertiesTest extends TestCase
{
    /** @test */
    public function properties_can_be_checked_with_isset_when_accessible()
    {
        $subject = new HandySubjectAccessible();

        $this->assertTrue(isset($subject->value));
    }
}
