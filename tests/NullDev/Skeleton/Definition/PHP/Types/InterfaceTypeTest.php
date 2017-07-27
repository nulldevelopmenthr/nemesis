<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\InterfaceType
 * @covers \NullDev\Skeleton\Definition\PHP\Types\ConceptName
 * @group  unit
 */
class InterfaceTypeTest extends PHPUnit_Framework_TestCase
{
    public function testNamespacedInterface(): void
    {
        $interfaceType = new InterfaceType('MyInterface', 'Namespace1\Namespace2');

        self::assertEquals('MyInterface', $interfaceType->getName());
        self::assertEquals('Namespace1\Namespace2\MyInterface', $interfaceType->getFullName());
        self::assertEquals('Namespace1\Namespace2', $interfaceType->getNamespace());
        self::assertTrue($interfaceType->hasNamespace());
    }

    public function testNonNamespacedInterface(): void
    {
        $interfaceType = new InterfaceType('MyInterface');

        self::assertEquals('MyInterface', $interfaceType->getName());
        self::assertEquals('MyInterface', $interfaceType->getFullName());
        self::assertEquals(null, $interfaceType->getNamespace());
        self::assertFalse($interfaceType->hasNamespace());
    }

    public function testNamespacedInterfaceCanBeCreatedFromFullyQualifiedClassName(): void
    {
        $interfaceType = InterfaceType::createFromFullyQualified('Namespace1\Namespace2\MyInterface');

        self::assertEquals('MyInterface', $interfaceType->getName());
        self::assertEquals('Namespace1\Namespace2\MyInterface', $interfaceType->getFullName());
        self::assertEquals('Namespace1\Namespace2', $interfaceType->getNamespace());
        self::assertTrue($interfaceType->hasNamespace());
    }

    public function testNonNamespacedInterfaceCanBeCreatedFromFullyQualifiedClassName(): void
    {
        $interfaceType = InterfaceType::createFromFullyQualified('MyInterface');

        self::assertEquals('MyInterface', $interfaceType->getName());
        self::assertEquals('MyInterface', $interfaceType->getFullName());
        self::assertEquals(null, $interfaceType->getNamespace());
        self::assertFalse($interfaceType->hasNamespace());
    }
}
