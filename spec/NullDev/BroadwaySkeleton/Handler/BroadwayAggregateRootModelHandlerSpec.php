<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel;
use NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootModelHandler;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BroadwayAggregateRootModelHandlerSpec extends ObjectBehavior
{
    public function let(EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory)
    {
        $this->beConstructedWith($eventSourcedAggregateRootSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayAggregateRootModelHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayAggregateRootModel $command,
        EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        ImprovedClassSource $modelClass
    ) {
        $rootIdClassName->getName()
            ->shouldBeCalled()
            ->willReturn('SomeId');

        $command->getRootIdClassName()
            ->shouldBeCalled()
            ->willReturn($rootIdClassName);
        $command->getModelClassName()
            ->shouldBeCalled()
            ->willReturn($modelClassName);

        $eventSourcedAggregateRootSourceFactory->create($modelClassName, Argument::type(Parameter::class))
            ->shouldBeCalled()
            ->willReturn($modelClass);

        $this->handleCreateBroadwayAggregateRootModel($command)->shouldBeArray();
    }
}
