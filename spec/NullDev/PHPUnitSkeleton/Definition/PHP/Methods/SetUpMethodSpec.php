<?php

declare(strict_types=1);

namespace spec\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class SetUpMethodSpec extends ObjectBehavior
{
    public function let(ImprovedClassSource $subjectUnderTest)
    {
        $subjectUnderTest->getConstructorParameters()->willReturn([]);

        $this->beConstructedWith($subjectUnderTest);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SetUpMethod::class);
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
        $this->getMethodName()->shouldReturn('setUp');
    }

    public function it_exposes_subject_under_test(ImprovedClassSource $subjectUnderTest)
    {
        $this->getSubjectUnderTest()->shouldReturn($subjectUnderTest);
    }

    public function it_exposes_subject_under_test_name(ImprovedClassSource $subjectUnderTest)
    {
        $subjectUnderTest->getName()->shouldBeCalled()->willReturn('Money');

        $this->getSubjectUnderTestName()->shouldReturn('Money');
    }

    public function it_exposes_subject_under_test_constructor_parameters(
        ImprovedClassSource $subjectUnderTest,
        Parameter $param1,
        Parameter $param2
    ) {
        $subjectUnderTest->getConstructorParameters()
            ->shouldBeCalled()
            ->willReturn([$param1, $param2]);

        $this->getSubjectUnderTestConstuctorParameters()->shouldReturn([$param1, $param2]);
    }

    public function it_exposes_subject_under_test_constructor_parameters_having_types(
        ImprovedClassSource $subjectUnderTest,
        Parameter $param1,
        Parameter $param2,
        ClassType $classType1
    ) {
        $subjectUnderTest->getConstructorParameters()
            ->shouldBeCalled()
            ->willReturn([$param1, $param2]);

        $param1->hasType()->shouldBeCalled()->willReturn(true);
        $param1->getType()->shouldBeCalled()->willReturn($classType1);
        $param2->hasType()->shouldBeCalled()->willReturn(false);

        $this->getSubjectUnderTestConstuctorParametersAsClassTypes()->shouldReturn([$classType1]);
    }
}
