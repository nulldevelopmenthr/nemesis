<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Parameter
 * @group  integration
 */
class ParameterTest extends PHPUnit_Framework_TestCase
{
    public function testItWorksWithType(): void
    {
        $type = ClassType::create('Vendor\Namespace\MyClass');

        $parameter = new Parameter('name', $type);

        self::assertEquals('name', $parameter->getName());
        self::assertEquals($type, $parameter->getType());
        self::assertEquals('MyClass', $parameter->getTypeShortName());
        self::assertTrue($parameter->hasType());
    }

    public function testItWorksWithoutType(): void
    {
        $parameter = new Parameter('name');
        self::assertEquals('name', $parameter->getName());
        self::assertNull($parameter->getType());
        self::assertNull($parameter->getTypeShortName());
        self::assertFalse($parameter->hasType());
    }
}
