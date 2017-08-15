<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayHandler;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PhpSpec\ObjectBehavior;

class CreateBroadwayHandlerSpec extends ObjectBehavior
{
    public function let(
        CommandHandlerClassName $handlerClassName,
        RootRepositoryClassName $repositoryClassName,
        RootIdClassName $idClassName,
        RootModelClassName $modelClassName
    ) {
        $this->beConstructedWith($handlerClassName, $repositoryClassName, $idClassName, $modelClassName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayHandler::class);
    }

    public function it_exposes_handler_class_name(CommandHandlerClassName $handlerClassName)
    {
        $this->getHandlerClassName()->shouldReturn($handlerClassName);
    }

    public function it_exposes_aggregate_root_repository_class_name(RootRepositoryClassName $repositoryClassName)
    {
        $this->getRepositoryClassName()->shouldReturn($repositoryClassName);
    }

    public function it_exposes_aggregate_root_id_class_name(RootIdClassName $idClassName)
    {
        $this->getIdClassName()->shouldReturn($idClassName);
    }

    public function it_exposes_aggregate_root_model_class_name(RootModelClassName $modelClassName)
    {
        $this->getModelClassName()->shouldReturn($modelClassName);
    }
}
