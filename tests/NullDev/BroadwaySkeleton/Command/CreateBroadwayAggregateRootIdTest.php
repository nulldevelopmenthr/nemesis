<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId
 * @group  todo
 */
class CreateBroadwayAggregateRootIdTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|RootIdClassName */
    private $rootIdClassName;
    /** @var CreateBroadwayAggregateRootId */
    private $sut;

    public function setUp()
    {
        $this->rootIdClassName = Mockery::mock(RootIdClassName::class);
        $this->sut             = new CreateBroadwayAggregateRootId($this->rootIdClassName);
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetRootIdClassName()
    {
        self::assertEquals($this->rootIdClassName, $this->sut->getRootIdClassName());
    }
}
