<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use PhpSpec\ObjectBehavior;

class DeserializeMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, Property $property1)
    {
        $this->beConstructedWith($className, [$property1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DeserializeMethod::class);
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
        $this->getName()->shouldReturn('deserialize');
    }

    /**
     * @TODO: not sure this is correct, parameters should be strings,ints,... and this doesnt handle when another object is property
     */
    public function it_has_parameters(Property $property1)
    {
        $this->getParameters()->shouldBeLike([$property1]);
    }

    public function it_exposes_return_type()
    {
        $this->getReturnType()->shouldReturn('self');
    }

    public function it_cant_have_nullable_return_type()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
