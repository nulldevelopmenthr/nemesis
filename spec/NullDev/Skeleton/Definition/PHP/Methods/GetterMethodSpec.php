<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Property;
use PhpSpec\ObjectBehavior;

class GetterMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith('getValue', $property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GetterMethod::class);
        $this->shouldHaveType(Method::class);
    }

    public function it_has_create_method(Property $property)
    {
        $property->getName()->willReturn('value');
        $this->create($property)->shouldReturnAnInstanceOf(GetterMethod::class);
    }

    public function it_knows_its_public()
    {
        $this->getVisibility()->shouldReturn('public');
    }

    public function it_knows_its_not_static_type()
    {
        $this->isStatic()->shouldReturn(false);
    }

    public function it_returns_property_name(Property $property)
    {
        $property->getName()->willReturn('value');
        $this->getPropertyName()->shouldReturn('value');
    }

    public function it_can_return_method_name(Property $property)
    {
        $property->getName()->willReturn('value');
        $this->getMethodName()->shouldReturn('getValue');
    }

    public function it_can_return_method_parameters()
    {
        $this->getMethodParameters()->shouldReturn([]);
    }

    public function it_knows_if_return_type_defined(Property $property)
    {
        $property->hasType()->willReturn(true);
        $property->getTypeShortName()->willReturn('SomeClass');

        $this->hasMethodReturnType()->shouldReturn(true);

        $this->getMethodReturnType()->shouldReturn('SomeClass');
    }

    public function it_has_no_return_type_if_property_it_gets_has_no_class(Property $property)
    {
        $property->hasType()->willReturn(false);
        $this->hasMethodReturnType()->shouldReturn(false);
    }

    public function it_throws_error_on_trying_to_get_return_type_when_it_does_not_exist(Property $property)
    {
        $property->hasType()->willReturn(false);
        $property->getTypeShortName()->willReturn(null);
        $this->shouldThrow(\TypeError::class)->duringGetMethodReturnType();
    }
}
