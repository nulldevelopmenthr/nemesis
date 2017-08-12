<?php

declare(strict_types=1);

namespace spec\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestSkippedMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use PhpSpec\ObjectBehavior;

class TestSkippedMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($methodUnderTestName = 'doSomething');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSkippedMethod::class);
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
        $this->shouldThrow(\Exception::class)->duringGetMethodReturnType();
    }

    public function it_exposes_method_name()
    {
        $this->getMethodName()->shouldReturn('testDoSomething');
    }
}
