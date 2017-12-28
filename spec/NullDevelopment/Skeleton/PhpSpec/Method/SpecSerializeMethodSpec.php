<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecSerializeMethod;
use PhpSpec\ObjectBehavior;

class SpecSerializeMethodSpec extends ObjectBehavior
{
    public function let(Property $property1, Property $property2)
    {
        $this->beConstructedWith([$property1, $property2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSerializeMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('it_can_be_serialized');
    }

    public function it_exposes_properties(Property $property1, Property $property2)
    {
        $this->getProperties()->shouldReturn([$property1, $property2]);
    }

    public function it_exposes_object_properties_as_parameters(Property $property1, Property $property2)
    {
        $property1->isObject()->shouldBeCalled()->willReturn(true);
        $property2->isObject()->shouldBeCalled()->willReturn(false);
        $this->getParameters()->shouldReturn([$property1]);
    }

    public function it_has_no_return_type()
    {
        $this->getReturnType()->shouldReturn('');
    }

    public function it_exposes_that_return_type_is_not_nullable()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
