<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\ObjectBehavior;

class PropertySpec extends ObjectBehavior
{
    public function let(ClassType $type)
    {
        $this->beConstructedWith($name = 'property', $type);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Property::class);
    }

    public function it_can_be_instantiated_via_factory_method_without_specifying_type()
    {
        $this->create('name')->shouldReturnAnInstanceOf(Property::class);
    }

    public function it_can_be_instantiated_via_factory_method_with_specificing_static_type()
    {
        $this->create('name', 'string')->shouldReturnAnInstanceOf(Property::class);
    }

    public function it_can_be_instantiated_via_factory_method_with_specifying_class_name()
    {
        $this->create('name', '\DateTime')->shouldReturnAnInstanceOf(Property::class);
    }

    public function it_can_be_instantiated_from_parameter(Parameter $parameter)
    {
        $parameter->getName()->shouldBeCalled()->willReturn('name');
        $parameter->getType()->shouldBeCalled()->willReturn(null);
        $this->createFromParameter($parameter)->shouldReturnAnInstanceOf(Property::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('property');
    }

    public function it_exposes_Property_class_type(ClassType $type)
    {
        $this->getType()->shouldReturn($type);
    }

    public function it_knows_Property_has_class()
    {
        $this->hasType()->shouldReturn(true);
    }

    public function it_exposes_Propertys_class_name_without_namespace(ClassType $type)
    {
        $type->getName()->shouldBeCalled()->willReturn('ClassName');

        $this->getTypeShortName()->shouldReturn('ClassName');
    }

    public function it_can_be_instantiated_without_class()
    {
        $this->beConstructedWith($name = 'property');
    }

    public function it_knows_there_is_no_class_defined()
    {
        $this->beConstructedWith($name = 'property');
        $this->hasType()->shouldReturn(false);
    }

    public function it_will_throw_error_for_class_short_name_if_no_type_defined()
    {
        $this->beConstructedWith($name = 'property');
        $this->shouldThrow(\Throwable::class)->duringGetTypeShortName();
    }
}
