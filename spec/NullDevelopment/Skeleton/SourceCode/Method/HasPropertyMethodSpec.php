<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method\HasPropertyMethod;
use PhpSpec\ObjectBehavior;

class HasPropertyMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith($name = 'hasFirstName', $property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(HasPropertyMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_has_create_method(Property $property)
    {
        $property->getName()->willReturn('value');
        $this->create($property)->shouldReturnAnInstanceOf(HasPropertyMethod::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('hasFirstName');
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
        $this->getReturnType()->shouldReturn('bool');
    }

    public function it_exposes_if_return_type_is_nullable()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
