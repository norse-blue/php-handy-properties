<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Tests\HandyObject;

use Exception;
use NorseBlue\HandyProperties\Exceptions\PropertyNotAccessibleException;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectAccessible;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectAccessibleAndMutable;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectCustomAccessibleAndMutable;
use NorseBlue\HandyProperties\Tests\Helpers\HandySubjectMutable;
use NorseBlue\HandyProperties\Tests\TestCase;

class AccessPropertiesTest extends TestCase
{
    /** @test */
    public function properties_can_be_accessed_when_property_is_accessible_with_default_value(): void
    {
        $subject = new HandySubjectAccessible();

        $this->assertEquals(0, $subject->value);
        $this->assertEquals(false, $subject->odd);
    }

    /** @test */
    public function properties_can_be_accessed_when_property_is_accessible(): void
    {
        $subject = new HandySubjectAccessible(3);

        $this->assertEquals(3, $subject->value);
        $this->assertEquals(true, $subject->odd);
    }

    /** @test */
    public function properties_can_be_accessed_when_property_accessor_exist(): void
    {
        $object = new HandySubjectAccessible();

        $subject_1 = $object->random_int;
        $subject_2 = $object->random_int;

        $this->assertIsInt($subject_1);
        $this->assertGreaterThanOrEqual(0, $subject_1);
        $this->assertLessThanOrEqual(9, $subject_1);

        $this->assertIsInt($subject_2);
        $this->assertGreaterThanOrEqual(0, $subject_2);
        $this->assertLessThanOrEqual(9, $subject_2);

        $this->assertNotEquals($subject_1, $subject_2);
    }

    /** @test */
    public function properties_can_be_accessed_when_property_is_accessible_and_mutable(): void
    {
        $subject = new HandySubjectAccessibleAndMutable(3);

        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function properties_can_be_accessed_with_custom_accessor_prefix_and_suffix(): void
    {
        $subject = new HandySubjectCustomAccessibleAndMutable(3);

        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function properties_cannot_be_accessed_when_property_is_not_accessible(): void
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
