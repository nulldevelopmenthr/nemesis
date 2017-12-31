<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDeserializeMethod;
use PhpSpec\ObjectBehavior;

class SpecDeserializeMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, Property $property1, Property $property2)
    {
        $this->beConstructedWith($className, [$property1, $property2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDeserializeMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('it_can_be_deserialized');
    }

    public function it_exposes_properties(Property $property1, Property $property2)
    {
        $this->getProperties()->shouldReturn([$property1, $property2]);
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
