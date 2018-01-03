<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ChainedGetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use PhpSpec\ObjectBehavior;

class ChainedGetterMethodSpec extends ObjectBehavior
{
    public function let(GetterMethod $getterMethod)
    {
        $this->beConstructedWith('getSomethingFromAnotherGetter', $getterMethod);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ChainedGetterMethod::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_knows_its_not_static_type()
    {
        $this->isStatic()->shouldReturn(false);
    }

    public function it_can_return_method_name()
    {
        $this->getName()->shouldReturn('getSomethingFromAnotherGetter');
    }

    public function it_can_return_method_parameters()
    {
        $this->getParameters()->shouldReturn([]);
    }

    public function it_asks_getter_for_return_type(GetterMethod $getterMethod)
    {
        $getterMethod->getReturnType()->shouldBeCalled()->willReturn('SomeClass');
        $getterMethod->isNullableReturnType()->shouldBeCalled()->willReturn(true);

        $this->getReturnType()->shouldReturn('SomeClass');
        $this->isNullableReturnType()->shouldReturn(true);
    }
}
