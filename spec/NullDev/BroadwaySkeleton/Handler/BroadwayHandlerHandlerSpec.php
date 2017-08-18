<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayHandler;
use NullDev\BroadwaySkeleton\Handler\BroadwayHandlerHandler;
use NullDev\BroadwaySkeleton\SourceFactory\CommandHandlerSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PhpSpec\ObjectBehavior;

class BroadwayHandlerHandlerSpec extends ObjectBehavior
{
    public function let(CommandHandlerSourceFactory $commandHandlerSourceFactory)
    {
        $this->beConstructedWith($commandHandlerSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayHandlerHandler::class);
    }

    public function it_will_handler_creating_broadway_command_handler(
        CreateBroadwayHandler $command,
        CommandHandlerSourceFactory $commandHandlerSourceFactory,
        CommandHandlerClassName $handlerClassName,
        RootRepositoryClassName $repositoryClassName,
        RootIdClassName $idClassName,
        RootModelClassName $modelClassName,
        ImprovedClassSource $handlerClass
    ) {
        $command->getHandlerClassName()
            ->shouldBeCalled()
            ->willReturn($handlerClassName);

        $command->getRepositoryClassName()
            ->shouldBeCalled()
            ->willReturn($repositoryClassName);

        $command->getIdClassName()
            ->shouldBeCalled()
            ->willReturn($idClassName);

        $command->getModelClassName()
            ->shouldBeCalled()
            ->willReturn($modelClassName);

        $commandHandlerSourceFactory->create($handlerClassName, $repositoryClassName, $idClassName, $modelClassName)
            ->shouldBeCalled()
            ->willReturn($handlerClass);

        $this->handleCreateBroadwayHandler($command)->shouldReturn([$handlerClass]);
    }
}
