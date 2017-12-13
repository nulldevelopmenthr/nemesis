<?php

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand
 * @group  todo
 */
class CreateBroadwayCommandTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $classType;
    /** @var array */
    private $parameters;
    /** @var CreateBroadwayCommand */
    private $sut;

    public function setUp()
    {
        $this->classType  = Mockery::mock(ClassType::class);
        $this->parameters = [];
        $this->sut        = new CreateBroadwayCommand($this->classType, $this->parameters);
    }

    public function testGetClassType()
    {
        self::assertEquals($this->classType, $this->sut->getClassType());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->sut->getParameters());
    }
}
