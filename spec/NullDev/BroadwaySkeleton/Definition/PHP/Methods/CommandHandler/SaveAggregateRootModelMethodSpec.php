<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\SaveAggregateRootModelMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use PhpSpec\ObjectBehavior;

class SaveAggregateRootModelMethodSpec extends ObjectBehavior
{
    public function let(RootModelClassName $modelClassName)
    {
        $this->beConstructedWith($modelClassName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SaveAggregateRootModelMethod::class);
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
        $this->getMethodName()->shouldReturn('save');
    }

    public function it_can_return_method_parameters(RootModelClassName $modelClassName)
    {
        $result= $this->getMethodParameters();

        $result->shouldBeArray();
        $result->shouldHaveCount(1);
        $result[0]->shouldBeAnInstanceOf(Parameter::class);
    }

    public function it_has_no_return()
    {
        $this->hasMethodReturnType()->shouldReturn(false);
    }
}
