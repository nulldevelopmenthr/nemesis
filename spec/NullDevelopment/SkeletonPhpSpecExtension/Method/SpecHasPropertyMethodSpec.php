<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecHasPropertyMethod;
use PhpSpec\ObjectBehavior;

class SpecHasPropertyMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith($name = 'it_has_first_name', $methodUnderTest = 'hasFirstName', $property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecHasPropertyMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('it_has_first_name');
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

    public function it_has_no_return_type()
    {
        $this->getReturnType()->shouldReturn('');
    }

    public function it_exposes_that_return_type_is_not_nullable()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
