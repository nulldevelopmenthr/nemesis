<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent
 * @group  todo
 */
class CreateBroadwayEventTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|ClassType */
    private $classType;
    /** @var array */
    private $parameters;
    /** @var CreateBroadwayEvent */
    private $createBroadwayEvent;

    public function setUp()
    {
        $this->classType           = Mockery::mock(ClassType::class);
        $this->parameters          = [];
        $this->createBroadwayEvent = new CreateBroadwayEvent($this->classType, $this->parameters);
    }

    public function testGetClassType()
    {
        self::assertEquals($this->classType, $this->createBroadwayEvent->getClassType());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->createBroadwayEvent->getParameters());
    }
}
