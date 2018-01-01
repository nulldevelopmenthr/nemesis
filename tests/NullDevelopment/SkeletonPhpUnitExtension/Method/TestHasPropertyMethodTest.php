<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\Method;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestHasPropertyMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\Method\TestHasPropertyMethod
 * @group todo
 */
class TestHasPropertyMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $name;

    /** @var string */
    private $methodUnderTest;

    /** @var MockInterface|Property */
    private $property;

    /** @var TestHasPropertyMethod */
    private $sut;

    public function setUp()
    {
        $this->name            = 'name';
        $this->methodUnderTest = 'methodUnderTest';
        $this->property        = Mockery::mock(Property::class);
        $this->sut             = new TestHasPropertyMethod($this->name, $this->methodUnderTest, $this->property);
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
