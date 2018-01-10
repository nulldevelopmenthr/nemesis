<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHP\Methods;

use Exception;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use PhpSpec\ObjectBehavior;

class ConstructorMethodSpec extends ObjectBehavior
{
    public function let(Parameter $parameter1, Parameter $parameter2)
    {
        $this->beConstructedWith($params = [$parameter1, $parameter2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConstructorMethod::class);
        $this->shouldHaveType(Method::class);
    }

    public function it_is_a_public_method()
    {
        $this->getVisibility()->shouldReturn('public');
    }

    public function it_is_not_static_method()
    {
        $this->isStatic()->shouldReturn(false);
    }

    public function it_is_named__constructor()
    {
        $this->getMethodName()->shouldReturn('__constructor');
    }

    public function it_exposes_method_parameters(Parameter $parameter1, Parameter $parameter2)
    {
        $this->getMethodParameters()->shouldReturn([$parameter1, $parameter2]);
    }

    public function it_has_no_return_type_defined()
    {
        $this->hasMethodReturnType()->shouldReturn(false);
    }

    public function it_throws_exception_if_trying_to_get_methods_return_type()
    {
        $this->shouldThrow(Exception::class)->duringGetMethodReturnType();
    }

    public function it_returns_only_parameters_with_defined_types_as_class_types(
        Parameter $parameter1, Parameter $parameter2, Type $classType1
    ) {
        $parameter1->hasType()->shouldBeCalled()->willReturn(true);
        $parameter1->getType()->shouldBeCalled()->willReturn($classType1);
        $parameter2->hasType()->shouldBeCalled()->willReturn(false);
        $this->getParamsAsClassTypes()->shouldReturn([$classType1]);
    }
}
