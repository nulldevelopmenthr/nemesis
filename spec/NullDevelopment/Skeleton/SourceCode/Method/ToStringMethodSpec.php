<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use PhpSpec\ObjectBehavior;

class ToStringMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith($property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ToStringMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('__toString');
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
        $this->getReturnType()->shouldReturn('string');
    }

    public function it_doesnt_support_nullable_on_return_type()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
