<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use Exception;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod
 * @group  unit
 */
class ConstructorMethodTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultGetters(): void
    {
        $method = new ConstructorMethod([]);

        self::assertEquals('public', $method->getVisibility());
        self::assertFalse($method->isStatic());
        self::assertEquals('__constructor', $method->getMethodName());
        self::assertFalse($method->hasMethodReturnType());
        self::assertEmpty($method->getMethodParameters());
        self::assertEmpty($method->getParamsAsClassTypes());
    }

    public function testItThrowsExceptionOnAccessingMethodReturnType(): void
    {
        $method = new ConstructorMethod([]);

        self::expectException(Exception::class);

        $method->getMethodReturnType();
    }

    public function testItCanReturnOnlyTypesUsedInConstructor(): void
    {
        $param1 = Parameter::create('noType');

        $type2  = ClassType::createFromFullyQualified('Namespace1\Namespace2\MyClass');
        $param2 = new Parameter('name', $type2);

        $method = new ConstructorMethod([$param1, $param2]);

        self::assertEquals([$type2], $method->getParamsAsClassTypes());
    }
}
