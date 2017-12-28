<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecToStringMethod;
use PhpSpec\ObjectBehavior;

class SpecToStringMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith($property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecToStringMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('it_is_castable_to_string');
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

    public function it_exposes_return_type()
    {
        $this->getReturnType()->shouldReturn('');
    }

    public function it_exposes_if_return_type_is_nullable()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
