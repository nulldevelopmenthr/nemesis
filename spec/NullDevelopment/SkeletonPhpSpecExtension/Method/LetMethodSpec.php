<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use PhpSpec\ObjectBehavior;

class LetMethodSpec extends ObjectBehavior
{
    public function let(Property $property1, Property $property2)
    {
        $this->beConstructedWith([$property1, $property2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LetMethod::class);
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

    public function it_exposes_parameters(Property $property1, Property $property2)
    {
        $this->getParameters()->shouldReturn([$property1, $property2]);
    }

    public function it_has_no_return_type()
    {
        $this->getReturnType()->shouldReturn('');
    }

    public function it_has_not_nullable_return_type()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
