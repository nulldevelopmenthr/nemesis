<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayCommandHandler;
use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class CreateBroadwayCommandHandlerSpec extends ObjectBehavior
{
    public function let(CommandSourceFactory $commandSourceFactory)
    {
        $this->beConstructedWith($commandSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayCommandHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayCommand $command,
        CommandSourceFactory $commandSourceFactory,
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

        $commandSourceFactory->create($classType, [$parameter1])
            ->shouldBeCalled()
            ->willReturn($class);

        $this->handleCreateBroadwayCommand($command)
            ->shouldReturn([$class]);
    }
}
