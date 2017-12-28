<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector
 * @group  todo
 */
class CreateBroadwayDoctrineOrmReadProjectorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $projectorClassType;
    /** @var array */
    private $entityParameters;
    /** @var CreateBroadwayDoctrineOrmReadProjector */
    private $sut;

    public function setUp()
    {
        $this->projectorClassType = Mockery::mock(ClassType::class);
        $this->entityParameters   = [];
        $this->sut                = new CreateBroadwayDoctrineOrmReadProjector($this->projectorClassType, $this->entityParameters);
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
