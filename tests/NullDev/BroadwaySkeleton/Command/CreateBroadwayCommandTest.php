<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand
 * @group  todo
 */
class CreateBroadwayCommandTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|ClassType */
    private $classType;
    /** @var array */
    private $parameters;
    /** @var CreateBroadwayCommand */
    private $createBroadwayCommand;

    public function setUp()
    {
        $this->classType             = Mockery::mock(ClassType::class);
        $this->parameters            = [];
        $this->createBroadwayCommand = new CreateBroadwayCommand($this->classType, $this->parameters);
    }

    public function testGetClassType()
    {
        self::assertEquals($this->classType, $this->createBroadwayCommand->getClassType());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->createBroadwayCommand->getParameters());
    }
}
