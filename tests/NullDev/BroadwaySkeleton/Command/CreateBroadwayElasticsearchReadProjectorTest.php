<?php

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector
 * @group  todo
 */
class CreateBroadwayElasticsearchReadProjectorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $projectorClassType;
    /** @var array */
    private $entityParameters;
    /** @var CreateBroadwayElasticsearchReadProjector */
    private $sut;

    public function setUp()
    {
        $this->projectorClassType = Mockery::mock(ClassType::class);
        $this->entityParameters   = [];
        $this->sut                = new CreateBroadwayElasticsearchReadProjector($this->projectorClassType, $this->entityParameters);
    }

    public function testGetProjectorClassType()
    {
        self::assertEquals($this->projectorClassType, $this->sut->getProjectorClassType());
    }

    public function testGetEntityParameters()
    {
        self::assertEquals($this->entityParameters, $this->sut->getEntityParameters());
    }
}
