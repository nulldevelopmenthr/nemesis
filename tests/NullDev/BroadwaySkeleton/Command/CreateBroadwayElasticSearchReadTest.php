<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead
 * @group  todo
 */
class CreateBroadwayElasticSearchReadTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|ClassType */
    private $entityClassType;
    /** @var array */
    private $entityParameters;
    /** @var \Mockery\MockInterface|ClassType */
    private $repositoryClassType;
    /** @var \Mockery\MockInterface|ClassType */
    private $projectorClassType;
    /** @var CreateBroadwayElasticSearchRead */
    private $createBroadwayElasticSearchRead;

    public function setUp()
    {
        $this->entityClassType                 = Mockery::mock(ClassType::class);
        $this->entityParameters                = [];
        $this->repositoryClassType             = Mockery::mock(ClassType::class);
        $this->projectorClassType              = Mockery::mock(ClassType::class);
        $this->createBroadwayElasticSearchRead = new CreateBroadwayElasticSearchRead(
            $this->entityClassType,
            $this->entityParameters,
            $this->repositoryClassType,
            $this->projectorClassType
        );
    }

    public function testGetEntityClassType()
    {
        self::assertEquals($this->entityClassType, $this->createBroadwayElasticSearchRead->getEntityClassType());
    }

    public function testGetEntityParameters()
    {
        self::assertEquals($this->entityParameters, $this->createBroadwayElasticSearchRead->getEntityParameters());
    }

    public function testGetRepositoryClassType()
    {
        self::assertEquals(
            $this->repositoryClassType,
            $this->createBroadwayElasticSearchRead->getRepositoryClassType()
        );
    }

    public function testGetProjectorClassType()
    {
        self::assertEquals($this->projectorClassType, $this->createBroadwayElasticSearchRead->getProjectorClassType());
    }
}
