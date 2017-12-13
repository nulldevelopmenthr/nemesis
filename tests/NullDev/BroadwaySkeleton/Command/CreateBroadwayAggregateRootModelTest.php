<?php

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel
 * @group  todo
 */
class CreateBroadwayAggregateRootModelTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|RootModelClassName */
    private $modelClassName;
    /** @var MockInterface|RootIdClassName */
    private $rootIdClassName;
    /** @var CreateBroadwayAggregateRootModel */
    private $sut;

    public function setUp()
    {
        $this->modelClassName  = Mockery::mock(RootModelClassName::class);
        $this->rootIdClassName = Mockery::mock(RootIdClassName::class);
        $this->sut             = new CreateBroadwayAggregateRootModel($this->modelClassName, $this->rootIdClassName);
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetModelClassName()
    {
        self::assertEquals($this->modelClassName, $this->sut->getModelClassName());
    }

    public function testGetRootIdClassName()
    {
        self::assertEquals($this->rootIdClassName, $this->sut->getRootIdClassName());
    }
}
