<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository
 * @group  todo
 */
class CreateBroadwayAggregateRootRepositoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|RootRepositoryClassName */
    private $repositoryClassName;
    /** @var MockInterface|RootModelClassName */
    private $modelClassName;
    /** @var CreateBroadwayAggregateRootRepository */
    private $sut;

    public function setUp()
    {
        $this->repositoryClassName = Mockery::mock(RootRepositoryClassName::class);
        $this->modelClassName      = Mockery::mock(RootModelClassName::class);
        $this->sut                 = new CreateBroadwayAggregateRootRepository($this->repositoryClassName, $this->modelClassName);
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetRepositoryClassName()
    {
        self::assertEquals($this->repositoryClassName, $this->sut->getRepositoryClassName());
    }

    public function testGetModelClassName()
    {
        self::assertEquals($this->modelClassName, $this->sut->getModelClassName());
    }
}
