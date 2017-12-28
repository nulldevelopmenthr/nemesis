<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeDeserializeMethod;
use PhpSpec\ObjectBehavior;

class SpecDateTimeDeserializeMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className)
    {
        $this->beConstructedWith($className);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeDeserializeMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('it_is_deserializable');
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
