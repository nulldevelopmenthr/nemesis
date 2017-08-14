<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayModel
 * @group  todo
 */
class CreateBroadwayModelTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|ClassType */
    private $modelIdType;
    /** @var \Mockery\MockInterface|ClassType */
    private $modelType;
    /** @var \Mockery\MockInterface|ClassType */
    private $repositoryType;
    /** @var CreateBroadwayModel */
    private $createBroadwayModel;

    public function setUp()
    {
        $this->modelIdType         = Mockery::mock(ClassType::class);
        $this->modelType           = Mockery::mock(ClassType::class);
        $this->repositoryType      = Mockery::mock(ClassType::class);
        $this->createBroadwayModel = new CreateBroadwayModel($this->modelIdType, $this->modelType, $this->repositoryType);
    }

    public function testGetModelIdType()
    {
        self::assertEquals($this->modelIdType, $this->createBroadwayModel->getModelIdType());
    }

    public function testGetModelType()
    {
        self::assertEquals($this->modelType, $this->createBroadwayModel->getModelType());
    }

    public function testGetRepositoryType()
    {
        self::assertEquals($this->repositoryType, $this->createBroadwayModel->getRepositoryType());
    }

    public function testGetModelIdAsParameter()
    {
        $this->markTestSkipped('Skipping');
    }
}
