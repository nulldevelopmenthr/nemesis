<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\ClassType
 * @covers \NullDev\Skeleton\Definition\PHP\Types\ConceptName
 * @group  unit
 */
class ClassTypeTest extends TestCase
{
    public function testNamespacedInterface(): void
    {
        $interfaceType = new ClassType('MyClass', 'Namespace1\Namespace2');

        self::assertEquals('MyClass', $interfaceType->getName());
        self::assertEquals('Namespace1\Namespace2\MyClass', $interfaceType->getFullName());
        self::assertEquals('Namespace1\Namespace2', $interfaceType->getNamespace());
        self::assertTrue($interfaceType->hasNamespace());
    }

    public function testNonNamespacedInterface(): void
    {
        $interfaceType = new ClassType('MyClass');

        self::assertEquals('MyClass', $interfaceType->getName());
        self::assertEquals('MyClass', $interfaceType->getFullName());
        self::assertEquals(null, $interfaceType->getNamespace());
        self::assertFalse($interfaceType->hasNamespace());
    }

    public function testNamespacedInterfaceCanBeCreatedFromFullyQualifiedClassName(): void
    {
        $interfaceType = ClassType::createFromFullyQualified('Namespace1\Namespace2\MyClass');

        self::assertEquals('MyClass', $interfaceType->getName());
        self::assertEquals('Namespace1\Namespace2\MyClass', $interfaceType->getFullName());
        self::assertEquals('Namespace1\Namespace2', $interfaceType->getNamespace());
        self::assertTrue($interfaceType->hasNamespace());
    }

    public function testNonNamespacedInterfaceCanBeCreatedFromFullyQualifiedClassName(): void
    {
        $interfaceType = ClassType::createFromFullyQualified('MyClass');

        self::assertEquals('MyClass', $interfaceType->getName());
        self::assertEquals('MyClass', $interfaceType->getFullName());
        self::assertEquals(null, $interfaceType->getNamespace());
        self::assertFalse($interfaceType->hasNamespace());
    }
}
