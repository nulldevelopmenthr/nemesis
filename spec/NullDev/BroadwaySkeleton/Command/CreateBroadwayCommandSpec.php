<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\ObjectBehavior;

class CreateBroadwayCommandSpec extends ObjectBehavior
{
    public function let(ClassType $classType, Parameter $parameter1)
    {
        $this->beConstructedWith($classType, [$parameter1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayCommand::class);
    }

    public function it_exposes_class_type_of_command_to_build(ClassType $classType)
    {
        $this->getClassType()->shouldReturn($classType);
    }

    public function it_exposes_parameters_of_command_to_build(Parameter $parameter1)
    {
        $this->getParameters()->shouldReturn([$parameter1]);
    }
}
