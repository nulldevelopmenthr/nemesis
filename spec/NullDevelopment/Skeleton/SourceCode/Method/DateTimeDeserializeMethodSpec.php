<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use PhpSpec\ObjectBehavior;

class DateTimeDeserializeMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className)
    {
        $this->beConstructedWith($className);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeDeserializeMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('deserialize');
    }

    public function it_has_value_parameter()
    {
        $this->getParameters()->shouldBeLike([new MethodParameter('value', new ClassName('', ''), false, false, null)]);
    }

    public function it_exposes_return_type()
    {
        $this->getReturnType()->shouldReturn('self');
    }

    public function it_exposes_if_return_type_is_nullable()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }

    public function it_is_a_static_method()
    {
        $this->isStatic()->shouldReturn(true);
    }
}
