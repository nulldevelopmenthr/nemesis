<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method\CreateEventMethod;
use PhpSpec\ObjectBehavior;

class CreateEventMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, Property $property1, Property $property2)
    {
        $property2->getInstanceFullName()->shouldBeCalled()->willReturn('string');
        $this->beConstructedWith($className, [$property1, $property2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventMethod::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('create');
    }

    public function it_exposes_properties_as_parameters(Property $property1, Property $property2)
    {
        $this->getParameters()->shouldReturn([$property1, $property2]);
    }

    public function it_doesnt_return_last_property_if_it_is_a_timestamp(Property $property1, Property $property2)
    {
        $property2->getInstanceFullName()->shouldBeCalled()->willReturn('DateTime');
        $this->getParameters()->shouldReturn([$property1]);
    }

    public function it_has_return_type()
    {
        $this->getReturnType()->shouldReturn('self');
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
