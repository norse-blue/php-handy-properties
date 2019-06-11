<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\HandyObject;

use Exception;
use NorseBlue\HandyProperties\Exceptions\PropertyNotAccessibleException;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectAccessible;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectAccessibleAndMutable;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectMutable;
use NorseBlue\HandyProperties\Tests\TestCase;

class AccessPropertiesTest extends TestCase
{
    /** @test */
    public function properties_can_be_accessed_when_property_is_accessible()
    {
        $subject = new HandySubjectAccessible(3);

        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function properties_can_be_accessed_when_property_is_accessible_and_mutable()
    {
        $subject = new HandySubjectAccessibleAndMutable(3);

        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function properties_cannot_be_accessed_when_property_is_not_accessible()
    {
        $subject = new HandySubjectMutable(3);

        try {
            $subject->value;
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotAccessibleException::class, $e);
            $this->assertEquals('value', $e->getProperty());

            return;
        }

        $this->fail(PropertyNotAccessibleException::class . ' was not thrown.');
    }
}
