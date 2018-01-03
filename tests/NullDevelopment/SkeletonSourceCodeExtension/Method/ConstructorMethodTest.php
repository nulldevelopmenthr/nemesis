<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod
 * @group  unit
 */
class ConstructorMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $properties;

    /** @var ConstructorMethod */
    private $sut;

    public function setUp()
    {
        $this->properties = [
            Fixtures::firstNameProperty(),
            Fixtures::lastNameProperty(),
        ];
        $this->sut = new ConstructorMethod($this->properties);
    }

    public function testGetName()
    {
        self::assertEquals('__construct', $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->properties, $this->sut->getParameters());
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

    public function testGetImports()
    {
        self::assertEquals(
            [ClassName::create('MyVendor\\User\\UserFirstName'), ClassName::create('MyVendor\\User\\UserLastName')],
            $this->sut->getImports()
        );
    }

    public function testIsStatic()
    {
        self::assertFalse($this->sut->isStatic());
    }
}
