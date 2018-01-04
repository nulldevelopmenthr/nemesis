<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method\CreateEventMethod;
use PHPUnit\Framework\TestCase;
use Tests\NullDevelopment\SkeletonBroadwayExtension\Event\EventFixtures;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method\CreateEventMethod
 * @group  todo
 */
class CreateEventMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ClassName */
    private $className;

    /** @var array */
    private $properties;

    /** @var CreateEventMethod */
    private $sut;

    public function setUp()
    {
        $this->className  = EventFixtures::showCreatedEventName();
        $this->properties = [EventFixtures::titleProperty()];
        $this->sut        = new CreateEventMethod($this->className, $this->properties);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->sut->getClassName());
    }

    public function testGetProperties()
    {
        self::assertEquals($this->properties, $this->sut->getProperties());
    }

    public function testIsLastPropertyTimeStamp()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParameters()
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

    public function testGetImports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsStatic()
    {
        $this->markTestSkipped('Skipping');
    }
}
