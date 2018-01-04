<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method\TestCreateEventMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method\TestCreateEventMethod
 * @group  todo
 */
class TestCreateEventMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ClassName */
    private $className;

    /** @var array */
    private $properties;

    /** @var TestCreateEventMethod */
    private $sut;

    public function setUp()
    {
        $this->className  = Mockery::mock(ClassName::class);
        $this->properties = [];
        $this->sut        = new TestCreateEventMethod($this->className, $this->properties);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->sut->getClassName());
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
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
