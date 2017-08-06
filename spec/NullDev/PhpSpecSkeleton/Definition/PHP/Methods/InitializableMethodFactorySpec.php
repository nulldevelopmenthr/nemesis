<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethod;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class InitializableMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InitializableMethodFactory::class);
    }

    public function it_will_create_instance_of_initializable_method_without_parent_or_interfaces(
        ImprovedClassSource $classSource,
        ClassType $classType
    ) {
        $classSource->getClassType()->shouldBeCalled()->willReturn($classType);
        $classSource->hasParent()->shouldBeCalled()->willReturn(false);
        $classSource->getInterfaces()->shouldBeCalled()->willReturn([]);

        $this->create($classSource)->shouldReturnAnInstanceOf(InitializableMethod::class);
    }

    public function it_will_create_instance_of_initializable_method_with_parent_and_interfaces(
        ImprovedClassSource $classSource,
        ClassType $classType,
        ClassType $parent,
        InterfaceType $interface1,
        InterfaceType $interface2
    ) {
        $classSource->getClassType()->shouldBeCalled()->willReturn($classType);
        $classSource->hasParent()->shouldBeCalled()->willReturn(true);
        $classSource->getParent()->shouldBeCalled()->willReturn($parent);
        $classSource->getInterfaces()->shouldBeCalled()->willReturn([$interface1, $interface2]);

        $this->create($classSource)->shouldReturnAnInstanceOf(InitializableMethod::class);
    }
}
