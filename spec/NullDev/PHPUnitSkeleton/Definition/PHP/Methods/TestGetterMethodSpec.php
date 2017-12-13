<?php

declare(strict_types=1);

namespace spec\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use Exception;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use PhpSpec\ObjectBehavior;

class TestGetterMethodSpec extends ObjectBehavior
{
    public function let(GetterMethod $method)
    {
        $this->beConstructedWith($method, $subjectUnderTestPropertyName = 'amount');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestGetterMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_has_no_method_parameters()
    {
        $this->getParamsAsClassTypes()->shouldReturn([]);
        $this->getMethodParameters()->shouldReturn([]);
    }

    public function it_is_a_public_method()
    {
        $this->getVisibility()->shouldReturn('public');
    }

    public function it_is_not_a_static_method()
    {
        $this->isStatic()->shouldReturn(false);
    }

    public function it_has_no_return_type()
    {
        $this->hasMethodReturnType()->shouldReturn(false);
    }

    public function it_throws_exception_if_asked_for_method_return_type()
    {
        $this->shouldThrow(Exception::class)->duringGetMethodReturnType();
    }

    public function it_exposes_method_name(GetterMethod $method)
    {
        $method->getMethodName()->shouldBeCalled()->willReturn('getMoney');
        $this->getMethodName()->shouldReturn('testGetMoney');
    }

    public function it_exposes_getter_method_name(GetterMethod $method)
    {
        $method->getMethodName()->shouldBeCalled()->willReturn('getMoney');
        $this->getGetterMethodName()->shouldReturn('getMoney');
    }

    public function it_exposes_parameter_name(GetterMethod $method)
    {
        $method->getPropertyName()->shouldBeCalled()->willReturn('money');
        $this->getParameterName()->shouldReturn('money');
    }

    public function it_exposes_subject_under_test_property_name()
    {
        $this->getSubjectUnderTestPropertyName()->shouldReturn('amount');
    }
}
