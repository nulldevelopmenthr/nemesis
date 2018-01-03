<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod
 * @group  unit
 */
class ToStringMethodTest extends TestCase
{
    /** @var Property */
    private $property;

    /** @var ToStringMethod */
    private $sut;

    public function setUp()
    {
        $this->property = Fixtures::firstNameProperty();
        $this->sut      = new ToStringMethod($this->property);
    }

    public function testGetProperty()
    {
        self::assertEquals($this->property, $this->sut->getProperty());
    }

    public function testGetPropertyName()
    {
        self::assertEquals('firstName', $this->sut->getPropertyName());
    }

    public function testGetVisibility()
    {
        self::assertEquals(new Visibility('public'), $this->sut->getVisibility());
    }

    public function testGetName()
    {
        self::assertEquals('__toString', $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals([], $this->sut->getParameters());
    }

    public function testGetReturnType()
    {
        self::assertEquals('string', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }

    public function testGetImports()
    {
        self::assertEquals([], $this->sut->getImports());
    }

    public function testIsStatic()
    {
        self::assertFalse($this->sut->isStatic());
    }
}
