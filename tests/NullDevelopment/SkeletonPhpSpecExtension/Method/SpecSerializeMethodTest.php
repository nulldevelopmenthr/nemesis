<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSerializeMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSerializeMethod
 * @group  unit
 */
class SpecSerializeMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $properties;

    /** @var SpecSerializeMethod */
    private $sut;

    public function setUp()
    {
        $this->properties = [];
        $this->sut        = new SpecSerializeMethod($this->properties);
    }

    public function testGetProperties()
    {
        self::assertEquals($this->properties, $this->sut->getProperties());
    }

    public function testGetName()
    {
        self::assertEquals('it_can_be_serialized', $this->sut->getName());
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
