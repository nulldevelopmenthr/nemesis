<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository
 * @group  todo
 */
class CreateBroadwayDoctrineOrmReadRepositoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $repositoryClassType;
    /** @var CreateBroadwayDoctrineOrmReadRepository */
    private $sut;

    public function setUp()
    {
        $this->repositoryClassType = Mockery::mock(ClassType::class);
        $this->sut                 = new CreateBroadwayDoctrineOrmReadRepository($this->repositoryClassType);
    }

    public function testGetRepositoryClassType()
    {
        self::assertEquals($this->repositoryClassType, $this->sut->getRepositoryClassType());
    }
}
