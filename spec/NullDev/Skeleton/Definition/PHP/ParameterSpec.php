<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\ObjectBehavior;

class ParameterSpec extends ObjectBehavior
{
    public function let(ClassType $type)
    {
        $this->beConstructedWith($name = 'param', $type);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Parameter::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('param');
    }

    public function it_exposes_parameter_class_type(ClassType $type)
    {
        $this->getType()->shouldReturn($type);
    }

    public function it_knows_parameter_has_class()
    {
        $this->hasType()->shouldReturn(true);
    }

    public function it_exposes_parameters_class_name_without_namespace(ClassType $type)
    {
        $type->getName()->shouldBeCalled()->willReturn('ClassName');

        $this->getTypeShortName()->shouldReturn('ClassName');
    }

    public function it_can_be_instantiated_without_class()
    {
        $this->beConstructedWith($name = 'param');
    }

    public function it_knows_there_is_no_class_defined()
    {
        $this->beConstructedWith($name = 'param');
        $this->hasType()->shouldReturn(false);
    }

    public function it_will_throw_error_for_class_short_name_if_no_type_defined()
    {
        $this->beConstructedWith($name = 'param');
        $this->shouldThrow(\Throwable::class)->duringGetTypeShortName();
    }
}
