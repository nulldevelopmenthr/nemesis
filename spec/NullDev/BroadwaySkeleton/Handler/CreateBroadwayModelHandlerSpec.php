<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use PhpSpec\ObjectBehavior;

class CreateBroadwayModelHandlerSpec extends ObjectBehavior
{
    public function let(
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory
    ) {
        $this->beConstructedWith(
            $uuid4IdentitySourceFactory,
            $eventSourcedAggregateRootSourceFactory,
            $eventSourcingRepositorySourceFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayModelHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayModel $command,
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        Parameter $modelIdParameter,
        ImprovedClassSource $modelIdClass,
        ImprovedClassSource $modelClass,
        ImprovedClassSource $repositoryClass
    ) {
        $command->getRootIdClassName()
            ->shouldBeCalled()
            ->willReturn($rootIdClassName);
        $command->getModelClassName()
            ->shouldBeCalled()
            ->willReturn($modelClassName);
        $command->getRepositoryClassName()
            ->shouldBeCalled()
            ->willReturn($repositoryClassName);
        $command->getRootIdAsParameter()
            ->shouldBeCalled()
            ->willReturn($modelIdParameter);

        $uuid4IdentitySourceFactory->create($rootIdClassName)
            ->shouldBeCalled()
            ->willReturn($modelIdClass);
        $eventSourcedAggregateRootSourceFactory->create($modelClassName, $modelIdParameter)
            ->shouldBeCalled()
            ->willReturn($modelClass);
        $eventSourcingRepositorySourceFactory->create($repositoryClassName, $modelClassName)
            ->shouldBeCalled()
            ->willReturn($repositoryClass);

        $this->handleCreateBroadwayModel($command)->shouldBeArray();
    }
}
