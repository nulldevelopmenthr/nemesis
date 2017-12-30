<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\BoundedContext;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Theater\BoundedContext\EventConfig;
use NullDev\Theater\Naming\EventClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\EventConfig
 * @group  todo
 */
class EventConfigTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $name;

    /** @var MockInterface|EventClassName */
    private $eventClassName;

    /** @var array */
    private $parameters;

    /** @var EventConfig */
    private $sut;

    public function setUp()
    {
        $this->name           = 'name';
        $this->eventClassName = Mockery::mock(EventClassName::class);
        $this->parameters     = [];
        $this->sut            = new EventConfig($this->name, $this->eventClassName, $this->parameters);
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetEventClassName()
    {
        self::assertEquals($this->eventClassName, $this->sut->getEventClassName());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->sut->getParameters());
    }
}
