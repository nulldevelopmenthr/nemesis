<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\Method\GetterMethod
 * @group  unit
 */
class GetterMethodTest extends TestCase
{
    /** @var string */
    private $name;
    /** @var Property */
    private $property;
    /** @var GetterMethod */
    private $sut;

    public function setUp()
    {
        $this->name     = 'name';
        $this->property = Fixtures::firstNameProperty();
        $this->sut      = new GetterMethod($this->name, $this->property);
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
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals([], $this->sut->getParameters());
    }

    public function testGetReturnType()
    {
        self::assertEquals('MyVendor\\User\\UserFirstName', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }
}
