<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\Handler\BroadwayModelHandler;
use NullDev\BroadwaySkeleton\SourceFactory\CommandHandlerSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PhpSpec\ObjectBehavior;

class BroadwayModelHandlerSpec extends ObjectBehavior
{
    public function let(
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory,
        CommandHandlerSourceFactory $commandHandlerSourceFactory
    ) {
        $this->beConstructedWith(
            $uuid4IdentitySourceFactory,
            $eventSourcedAggregateRootSourceFactory,
            $eventSourcingRepositorySourceFactory,
            $commandHandlerSourceFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayModelHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayModel $command,
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory,
        CommandHandlerSourceFactory $commandHandlerSourceFactory,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHandlerClassName $handlerClassName,
        Parameter $modelIdParameter,
        ImprovedClassSource $modelIdClass,
        ImprovedClassSource $modelClass,
        ImprovedClassSource $repositoryClass,
        ImprovedClassSource $handlerClass
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
        $command->getCommandHandlerClassName()
            ->shouldBeCalled()
            ->willReturn($handlerClassName);
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
        $commandHandlerSourceFactory->create($handlerClassName, $repositoryClassName, $rootIdClassName, $modelClassName)
            ->shouldBeCalled()
            ->willReturn($handlerClass);

        $this->handleCreateBroadwayModel($command)->shouldBeArray();
    }
}
