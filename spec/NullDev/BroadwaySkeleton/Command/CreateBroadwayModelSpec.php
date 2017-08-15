<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PhpSpec\ObjectBehavior;

class CreateBroadwayModelSpec extends ObjectBehavior
{
    public function let(
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHandlerClassName $commandHandlerClassName
    ) {
        $this->beConstructedWith($rootIdClassName, $modelClassName, $repositoryClassName, $commandHandlerClassName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayModel::class);
    }

    public function it_will_expose_root_id_class_name(RootIdClassName $rootIdClassName)
    {
        $this->getRootIdClassName()->shouldReturn($rootIdClassName);
    }

    public function it_will_expose_model_class_name(RootModelClassName $modelClassName)
    {
        $this->getModelClassName()->shouldReturn($modelClassName);
    }

    public function it_will_expose_repository_class_name(RootRepositoryClassName $repositoryClassName)
    {
        $this->getRepositoryClassName()->shouldReturn($repositoryClassName);
    }

    public function it_will_expose_command_handler_class_name(CommandHandlerClassName $commandHandlerClassName)
    {
        $this->getCommandHandlerClassName()->shouldReturn($commandHandlerClassName);
    }

    public function it_will_expose_root_id_as_parameter(RootIdClassName $rootIdClassName)
    {
        $rootIdClassName->getName()->shouldBeCalled()->willReturn('Vendor\Namespace\Core\SomeId');
        $this->getRootIdAsParameter()->shouldReturnAnInstanceOf(Parameter::class);
    }
}
