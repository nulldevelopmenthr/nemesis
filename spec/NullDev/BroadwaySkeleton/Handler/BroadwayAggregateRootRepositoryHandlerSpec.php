<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository;
use NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootRepositoryHandler;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use PhpSpec\ObjectBehavior;

class BroadwayAggregateRootRepositoryHandlerSpec extends ObjectBehavior
{
    public function let(EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory)
    {
        $this->beConstructedWith($eventSourcingRepositorySourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayAggregateRootRepositoryHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayAggregateRootRepository $command,
        EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        ImprovedClassSource $repositoryClass
    ) {
        $command->getModelClassName()
            ->shouldBeCalled()
            ->willReturn($modelClassName);
        $command->getRepositoryClassName()
            ->shouldBeCalled()
            ->willReturn($repositoryClassName);

        $eventSourcingRepositorySourceFactory->create($repositoryClassName, $modelClassName)
            ->shouldBeCalled()
            ->willReturn($repositoryClass);

        $this->handleCreateBroadwayAggregateRootRepository($command)->shouldBeArray();
    }
}
