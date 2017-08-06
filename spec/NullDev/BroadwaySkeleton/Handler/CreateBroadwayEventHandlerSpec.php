<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayEventHandler;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class CreateBroadwayEventHandlerSpec extends ObjectBehavior
{
    public function let(
        EventSourceFactory $eventSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->beConstructedWith(
            $eventSourceFactory,
            $specGenerator,
            $unitTestGenerator
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayEventHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayEvent $command,
        EventSourceFactory $eventSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator,
        ClassType $classType,
        Parameter $parameter1,
        ImprovedClassSource $class,
        ImprovedClassSource $spec,
        ImprovedClassSource $test
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

        $specGenerator->generate($class)
            ->shouldBeCalled()
            ->willReturn($spec);
        $unitTestGenerator->generate($class)
            ->shouldBeCalled()
            ->willReturn($test);

        $this->handle($command)
            ->shouldReturn([$class, $spec, $test]);
    }
}
