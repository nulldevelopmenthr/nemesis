<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository
 * @group  todo
 */
class CreateBroadwayElasticsearchReadRepositoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $repositoryClassType;
    /** @var CreateBroadwayElasticsearchReadRepository */
    private $sut;

    public function setUp()
    {
        $this->repositoryClassType = Mockery::mock(ClassType::class);
        $this->sut                 = new CreateBroadwayElasticsearchReadRepository($this->repositoryClassType);
    }

    public function testGetRepositoryClassType()
    {
        self::assertEquals($this->repositoryClassType, $this->sut->getRepositoryClassType());
    }
}
