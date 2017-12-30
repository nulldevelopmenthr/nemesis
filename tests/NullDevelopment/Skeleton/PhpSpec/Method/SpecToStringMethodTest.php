<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecToStringMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\Method\SpecToStringMethod
 * @group  unit
 */
class SpecToStringMethodTest extends TestCase
{
    /** @var Property */
    private $property;

    /** @var SpecToStringMethod */
    private $sut;

    public function setUp()
    {
        $this->property = Fixtures::firstNameProperty();
        $this->sut      = new SpecToStringMethod($this->property);
    }

    public function testGetProperty()
    {
        self::assertEquals($this->property, $this->sut->getProperty());
    }

    public function testGetPropertyName()
    {
        self::assertEquals('firstName', $this->sut->getPropertyName());
    }

    public function testGetName()
    {
        self::assertEquals('it_is_castable_to_string', $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals([], $this->sut->getParameters());
    }

    public function testGetImports()
    {
        self::assertEquals([], $this->sut->getImports());
    }

    public function testGetVisibility()
    {
        self::assertEquals(new Visibility('public'), $this->sut->getVisibility());
    }

    public function testGetReturnType()
    {
        self::assertEquals('', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }

    public function testIsStatic()
    {
        self::assertFalse($this->sut->isStatic());
    }
}
