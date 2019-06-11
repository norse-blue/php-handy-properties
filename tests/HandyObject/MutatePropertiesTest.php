<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\HandyObject;

use Exception;
use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectAccessible;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectAccessibleAndMutable;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectMutable;
use NorseBlue\HandyProperties\Tests\TestCase;

class MutatePropertiesTest extends TestCase
{
    /** @test */
    public function properties_can_be_mutated_when_property_is_mutable()
    {
        $this->expectNotToPerformAssertions();

        $subject = new HandySubjectMutable();

        $subject->value = 3;
    }

    /** @test */
    public function properties_can_be_accessed_when_property_is_accessible_and_mutable()
    {
        $subject = new HandySubjectAccessibleAndMutable();

        $subject->value = 3;

        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function properties_cannot_be_accessed_when_property_is_not_mutable()
    {
        $subject = new HandySubjectAccessible();

        try {
            $subject->value = 3;
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotMutableException::class, $e);
            $this->assertEquals('value', $e->getProperty());

            return;
        }

        $this->fail(PropertyNotMutableException::class . ' was not thrown.');
    }
}
