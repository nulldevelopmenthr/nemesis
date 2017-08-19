<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\BoundedContext;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\BoundedContext\CommandConfig;
use NullDev\Theater\Naming\CommandClassName;
use PhpSpec\ObjectBehavior;

class CommandConfigSpec extends ObjectBehavior
{
    public function let(CommandClassName $commandClassName, Parameter $parameter1)
    {
        $this->beConstructedWith($name = 'BuySomething', $commandClassName, [$parameter1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandConfig::class);
    }

    public function it_exposes_command_name()
    {
        $this->getName()->shouldReturn('BuySomething');
    }

    public function it_exposes_command_class_name(CommandClassName $commandClassName)
    {
        $this->getCommandClassName()->shouldReturn($commandClassName);
    }

    public function it_exposes_command_parameters(Parameter $parameter1)
    {
        $this->getParameters()->shouldReturn([$parameter1]);
    }
}
