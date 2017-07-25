<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TraitType
 * @covers \NullDev\Skeleton\Definition\PHP\Types\ConceptName
 * @group  unit
 */
class TraitTypeTest extends PHPUnit_Framework_TestCase
{
    public function testNamespacedTrait(): void
    {
        $traitType = new TraitType('MyTrait', 'Namespace1\Namespace2');

        self::assertEquals('MyTrait', $traitType->getName());
        self::assertEquals('Namespace1\Namespace2\MyTrait', $traitType->getFullName());
        self::assertEquals('Namespace1\Namespace2', $traitType->getNamespace());
        self::assertTrue($traitType->hasNamespace());
    }

    public function testNonNamespacedTrait(): void
    {
        $traitType = new TraitType('MyTrait');

        self::assertEquals('MyTrait', $traitType->getName());
        self::assertEquals('MyTrait', $traitType->getFullName());
        self::assertEquals(null, $traitType->getNamespace());
        self::assertFalse($traitType->hasNamespace());
    }

    public function testNamespacedTraitCanBeCreatedFromFullyQualifiedClassName(): void
    {
        $traitType = TraitType::create('Namespace1\Namespace2\MyTrait');

        self::assertEquals('MyTrait', $traitType->getName());
        self::assertEquals('Namespace1\Namespace2\MyTrait', $traitType->getFullName());
        self::assertEquals('Namespace1\Namespace2', $traitType->getNamespace());
        self::assertTrue($traitType->hasNamespace());
    }

    public function testNonNamespacedTraitCanBeCreatedFromFullyQualifiedClassName(): void
    {
        $traitType = TraitType::create('MyTrait');

        self::assertEquals('MyTrait', $traitType->getName());
        self::assertEquals('MyTrait', $traitType->getFullName());
        self::assertEquals(null, $traitType->getNamespace());
        self::assertFalse($traitType->hasNamespace());
    }
}
