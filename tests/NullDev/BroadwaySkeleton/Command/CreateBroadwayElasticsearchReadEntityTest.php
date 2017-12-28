<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity
 * @group  todo
 */
class CreateBroadwayElasticsearchReadEntityTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $entityClassType;
    /** @var array */
    private $entityParameters;
    /** @var CreateBroadwayElasticsearchReadEntity */
    private $sut;

    public function setUp()
    {
        $this->entityClassType  = Mockery::mock(ClassType::class);
        $this->entityParameters = [];
        $this->sut              = new CreateBroadwayElasticsearchReadEntity($this->entityClassType, $this->entityParameters);
    }

    public function testGetEntityClassType()
    {
        self::assertEquals($this->entityClassType, $this->sut->getEntityClassType());
    }

    public function testGetEntityParameters()
    {
        self::assertEquals($this->entityParameters, $this->sut->getEntityParameters());
    }
}
