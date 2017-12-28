<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;
use PhpSpec\ObjectBehavior;

class DateTimeSerializeMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeSerializeMethod::class);
        $this->shouldImplement(Method::class);
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

    public function it_exposes_return_type()
    {
        $this->getReturnType()->shouldReturn('string');
    }

    public function it_exposes_if_return_type_is_nullable()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
