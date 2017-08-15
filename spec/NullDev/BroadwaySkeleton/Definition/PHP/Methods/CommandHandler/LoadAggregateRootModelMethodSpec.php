<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\LoadAggregateRootModelMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use PhpSpec\ObjectBehavior;

class LoadAggregateRootModelMethodSpec extends ObjectBehavior
{
    public function let(RootIdClassName $idClassName, RootModelClassName $modelClassName)
    {
        $this->beConstructedWith($idClassName, $modelClassName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LoadAggregateRootModelMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_knows_its_private()
    {
        $this->getVisibility()->shouldReturn('private');
    }

    public function it_knows_its_not_static_type()
    {
        $this->isStatic()->shouldReturn(false);
    }

    public function it_can_return_method_name()
    {
        $this->getMethodName()->shouldReturn('load');
    }

    public function it_can_return_method_parameters(RootIdClassName $idClassName)
    {
        $result= $this->getMethodParameters();

        $result->shouldBeArray();
        $result->shouldHaveCount(1);
        $result[0]->shouldBeAnInstanceOf(Parameter::class);
    }

    public function it_has_return_type_defined(RootModelClassName $modelClassName)
    {
        $modelClassName->getName()->shouldBeCalled()->willReturn('BuyerModel');

        $this->hasMethodReturnType()->shouldReturn(true);
        $this->getMethodReturnType()->shouldReturn('BuyerModel');
    }
}
