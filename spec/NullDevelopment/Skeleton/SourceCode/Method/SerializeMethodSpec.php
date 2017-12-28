<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use PhpSpec\ObjectBehavior;

class SerializeMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, Property $property1)
    {
        $this->beConstructedWith($className, [$property1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SerializeMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_class_name(ClassName $className)
    {
        $this->getClassName()->shouldReturn($className);
    }

    public function it_exposes_properties(Property $property1)
    {
        $this->getProperties()->shouldReturn([$property1]);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('serialize');
    }

    public function it_has_no_parameters()
    {
        $this->getParameters()->shouldReturn([]);
    }

    public function it_exposes_return_type(Property $property1)
    {
        $property1->isObject()->shouldBeCalled()->willReturn(false);
        $property1->getInstanceFullName()->shouldBeCalled()->willReturn('string');
        $this->getReturnType()->shouldReturn('string');
    }

    public function it_cant_have_nullable_return_type()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
