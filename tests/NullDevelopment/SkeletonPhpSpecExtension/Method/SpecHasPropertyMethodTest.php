<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\Method;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecHasPropertyMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\Method\SpecHasPropertyMethod
 * @group  todo
 */
class SpecHasPropertyMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $name;

    /** @var string */
    private $methodUnderTest;

    /** @var MockInterface|Property */
    private $property;

    /** @var SpecHasPropertyMethod */
    private $sut;

    public function setUp()
    {
        $this->name            = 'name';
        $this->methodUnderTest = 'methodUnderTest';
        $this->property        = Mockery::mock(Property::class);
        $this->sut             = new SpecHasPropertyMethod($this->name, $this->methodUnderTest, $this->property);
    }

    public function testGetMethodUnderTest()
    {
        self::assertEquals($this->methodUnderTest, $this->sut->getMethodUnderTest());
    }

    public function testGetProperty()
    {
        self::assertEquals($this->property, $this->sut->getProperty());
    }

    public function testGetPropertyName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetImports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsNullableReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsStatic()
    {
        $this->markTestSkipped('Skipping');
    }
}
