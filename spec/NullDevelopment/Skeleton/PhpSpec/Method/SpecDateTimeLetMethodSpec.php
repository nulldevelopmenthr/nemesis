<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeLetMethod;
use PhpSpec\ObjectBehavior;

class SpecDateTimeLetMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeLetMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('let');
    }

    public function it_has_no_parameters()
    {
        $this->getParameters()->shouldReturn([]);
    }

    public function it_has_no_return_type()
    {
        $this->getReturnType()->shouldReturn('');
    }

    public function it_has_not_nullable_return_type()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }

    public function it_exposes_imports()
    {
        $this->getImports()->shouldReturn([]);
    }
}
