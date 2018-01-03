<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonSourceCodeExtension\Method\UuidV4CreateMethod;
use PhpSpec\ObjectBehavior;

class UuidV4CreateMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UuidV4CreateMethod::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_knows_its_not_static_type()
    {
        $this->isStatic()->shouldReturn(false);
    }

    public function it_can_return_method_name()
    {
        $this->getName()->shouldReturn('create');
    }

    public function it_has_no_method_parameters()
    {
        $this->getParameters()->shouldReturn([]);
    }

    public function it_asks_getter_for_return_type()
    {
        $this->getReturnType()->shouldReturn('self');
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
