<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\BroadwaySkeleton\Handler\BroadwayEventHandler;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayEventHandlerSpec extends ObjectBehavior
{
    public function let(EventSourceFactory $eventSourceFactory)
    {
        $this->beConstructedWith($eventSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayEventHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayEvent $command,
        EventSourceFactory $eventSourceFactory,
        ClassType $classType,
        Parameter $parameter1,
        ImprovedClassSource $class
    ) {
        $command->getClassType()
            ->shouldBeCalled()
            ->willReturn($classType);
        $command->getParameters()
            ->shouldBeCalled()
            ->willReturn([$parameter1]);

        $eventSourceFactory->create($classType, [$parameter1])
            ->shouldBeCalled()
            ->willReturn($class);

        $this->handleCreateBroadwayEvent($command)
            ->shouldReturn([$class]);
    }
}
