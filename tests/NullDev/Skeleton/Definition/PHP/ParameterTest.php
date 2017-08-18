<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Parameter
 * @group  unit
 */
class ParameterTest extends PHPUnit_Framework_TestCase
{
    public function testItWorksWithType(): void
    {
        $type = ClassType::createFromFullyQualified('Vendor\Namespace\MyClass');

        $parameter = new Parameter('name', $type);

        self::assertEquals('name', $parameter->getName());
        self::assertEquals($type, $parameter->getType());
        self::assertEquals('MyClass', $parameter->getTypeShortName());
        self::assertTrue($parameter->hasType());
    }

    public function testItWorksWithoutType(): void
    {
        $parameter = Parameter::create('name');
        self::assertEquals('name', $parameter->getName());
        self::assertNull($parameter->getType());
        self::assertFalse($parameter->hasType());
    }

    /** @expectedException \Throwable */
    public function testItThrowsExceptionWithoutTypeOnCallingGetTypeShortName(): void
    {
        $parameter = Parameter::create('name');
        $parameter->getTypeShortName();
    }

    /** @dataProvider provideProperties */
    public function testItCanCreateParameterFromProperty(Property $property)
    {
        $parameter = Parameter::createFromProperty($property);

        self::assertInstanceOf(Parameter::class, $parameter);
        self::assertEquals($property->getName(), $parameter->getName());
        self::assertEquals($property->getType(), $parameter->getType());
    }

    public function provideProperties(): array
    {
        return [
            [Property::create('name')],
            [Property::create('name', 'string')],
            [Property::create('name', 'DateTime')],
        ];
    }
}
