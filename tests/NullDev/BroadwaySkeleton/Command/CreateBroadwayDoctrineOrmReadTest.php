<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead
 * @group  todo
 */
class CreateBroadwayDoctrineOrmReadTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|ClassType */
    private $entityClassType;
    /** @var array */
    private $entityParameters;
    /** @var \Mockery\MockInterface|ClassType */
    private $repositoryClassType;
    /** @var \Mockery\MockInterface|ClassType */
    private $factoryClassType;
    /** @var \Mockery\MockInterface|ClassType */
    private $projectorClassType;
    /** @var CreateBroadwayDoctrineOrmRead */
    private $createBroadwayDoctrineOrmRead;

    public function setUp()
    {
        $this->entityClassType               = Mockery::mock(ClassType::class);
        $this->entityParameters              = [];
        $this->repositoryClassType           = Mockery::mock(ClassType::class);
        $this->factoryClassType              = Mockery::mock(ClassType::class);
        $this->projectorClassType            = Mockery::mock(ClassType::class);
        $this->createBroadwayDoctrineOrmRead = new CreateBroadwayDoctrineOrmRead(
            $this->entityClassType,
            $this->entityParameters,
            $this->repositoryClassType,
            $this->factoryClassType,
            $this->projectorClassType
        );
    }

    public function testGetEntityClassType()
    {
        self::assertEquals($this->entityClassType, $this->createBroadwayDoctrineOrmRead->getEntityClassType());
    }

    public function testGetEntityParameters()
    {
        self::assertEquals($this->entityParameters, $this->createBroadwayDoctrineOrmRead->getEntityParameters());
    }

    public function testGetRepositoryClassType()
    {
        self::assertEquals($this->repositoryClassType, $this->createBroadwayDoctrineOrmRead->getRepositoryClassType());
    }

    public function testGetFactoryClassType()
    {
        self::assertEquals($this->factoryClassType, $this->createBroadwayDoctrineOrmRead->getFactoryClassType());
    }

    public function testGetProjectorClassType()
    {
        self::assertEquals($this->projectorClassType, $this->createBroadwayDoctrineOrmRead->getProjectorClassType());
    }
}
