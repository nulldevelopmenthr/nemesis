<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
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
        ClassType $modelIdType,
        ClassType $modelType,
        ClassType $repositoryType,
        Parameter $modelIdParameter,
        ImprovedClassSource $modelIdClass,
        ImprovedClassSource $modelClass,
        ImprovedClassSource $repositoryClass
    ) {
        $command->getModelIdType()->shouldBeCalled()->willReturn($modelIdType);
        $command->getModelType()->shouldBeCalled()->willReturn($modelType);
        $command->getRepositoryType()->shouldBeCalled()->willReturn($repositoryType);
        $command->getModelIdAsParameter()->shouldBeCalled()->willReturn($modelIdParameter);

        $uuid4IdentitySourceFactory->create($modelIdType)->shouldBeCalled()->willReturn($modelIdClass);
        $eventSourcedAggregateRootSourceFactory->create($modelType, $modelIdParameter)->shouldBeCalled()->willReturn($modelClass);
        $eventSourcingRepositorySourceFactory->create($repositoryType, $modelType)->shouldBeCalled()->willReturn($repositoryClass);

        $this->handle($command)->shouldBeArray();
    }
}
