<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use PhpSpec\ObjectBehavior;

class GetterMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith($name = 'getFirstName', $property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GetterMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_has_create_method(Property $property)
    {
        $property->getInstanceNameAsString()->shouldBeCalled()->willReturn('string');
        $property->getName()->willReturn('value');
        $this->create($property)->shouldReturnAnInstanceOf(GetterMethod::class);
    }

    public function it_can_create_bool_method_getter_too(Property $property)
    {
        $property->getInstanceNameAsString()->shouldBeCalled()->willReturn('bool');
        $property->getName()->willReturn('value');
        $this->create($property)->shouldReturnAnInstanceOf(GetterMethod::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('getFirstName');
    }

    public function it_exposes_property(Property $property)
    {
        $this->getProperty()->shouldReturn($property);
    }

    public function it_exposes_property_name(Property $property)
    {
        $property->getName()->shouldBeCalled()->willReturn('firstName');
        $this->getPropertyName()->shouldReturn('firstName');
    }

    public function it_has_no_parameters()
    {
        $this->getParameters()->shouldReturn([]);
    }

    public function it_exposes_return_type(Property $property)
    {
        $property->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');
        $this->getReturnType()->shouldReturn('MyVendor\\User\\UserFirstName');
    }

    public function it_exposes_if_return_type_is_nullable(Property $property)
    {
        $property->isNullable()->shouldBeCalled()->willReturn(true);
        $this->isNullableReturnType()->shouldReturn(true);
    }
}
