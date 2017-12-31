<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod
 * @group  unit
 */
class LetMethodTest extends TestCase
{
    /** @var array */
    private $properties;

    /** @var LetMethod */
    private $sut;

    public function setUp()
    {
        $this->properties = [
            Fixtures::firstNameProperty(),
            Fixtures::lastNameProperty(),
        ];
        $this->sut = new LetMethod($this->properties);
    }

    public function testGetName()
    {
        self::assertEquals('let', $this->sut->getName());
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
}
