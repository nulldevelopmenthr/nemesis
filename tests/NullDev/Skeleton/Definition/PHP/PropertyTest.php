<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Property
 * @group  unit
 */
class PropertyTest extends TestCase
{
    public function testItWorksWithType(): void
    {
        $type = ClassType::createFromFullyQualified('Vendor\Namespace\MyClass');

        $property = new Property('name', $type);

        self::assertEquals('name', $property->getName());
        self::assertEquals($type, $property->getType());
        self::assertEquals('MyClass', $property->getTypeShortName());
        self::assertTrue($property->hasType());
    }

    public function testItWorksWithoutType(): void
    {
        $property = Property::create('name');
        self::assertEquals('name', $property->getName());
        self::assertNull($property->getType());
        self::assertFalse($property->hasType());
    }

    /** @expectedException \Throwable */
    public function testItThrowsExceptionWithoutTypeOnCallingGetTypeShortName(): void
    {
        $property = Property::create('name');
        $property->getTypeShortName();
    }

    /** @dataProvider provideParameters */
    public function testItCanCreatePropertyFromParameter(Parameter $parameter)
    {
        $property = Property::createFromParameter($parameter);

        self::assertInstanceOf(Property::class, $property);
        self::assertEquals($parameter->getName(), $property->getName());
        self::assertEquals($parameter->getType(), $property->getType());
    }

    public function provideParameters(): array
    {
        return [
            [Parameter::create('name')],
            [Parameter::create('name', 'string')],
            [Parameter::create('name', 'DateTime')],
        ];
    }
}
