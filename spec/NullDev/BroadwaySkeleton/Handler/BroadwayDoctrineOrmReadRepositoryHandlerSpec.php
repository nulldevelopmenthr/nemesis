<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadRepositoryHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayDoctrineOrmReadRepositoryHandlerSpec extends ObjectBehavior
{
    public function let(ReadRepositorySourceFactory $readRepositorySourceFactory)
    {
        $this->beConstructedWith($readRepositorySourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayDoctrineOrmReadRepositoryHandler::class);
    }

    public function it_will_handle_creating_broadway_doctrine_orm_read_repository(
        CreateBroadwayDoctrineOrmReadRepository $command,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ClassType $repositoryType,
        ImprovedClassSource $repositoryClass
    ) {
        $command->getRepositoryClassType()->shouldBeCalled()->willReturn($repositoryType);

        $readRepositorySourceFactory->create($repositoryType)->shouldBeCalled()->willReturn($repositoryClass);

        $this->handleCreateBroadwayDoctrineOrmReadRepository($command)->shouldBeArray();
    }
}
