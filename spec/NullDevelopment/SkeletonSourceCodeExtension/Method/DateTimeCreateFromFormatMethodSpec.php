<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeCreateFromFormatMethod;
use PhpSpec\ObjectBehavior;

class DateTimeCreateFromFormatMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeCreateFromFormatMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_its_visibility_is_hardcoded_to_public()
    {
        $this->getVisibility()->shouldBeLike(new Visibility('public'));
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('createFromFormat');
    }

    public function it_has_no_parameters()
    {
        $this->getParameters()->shouldBeLike(
            [
                new MethodParameter('format', new ClassName('', ''), false, false, null),
                new MethodParameter('time', new ClassName('', ''), false, false, null),
                new MethodParameter('object', new ClassName('', ''), false, true, null),
            ]
        );
    }

    public function it_exposes_return_type()
    {
        $this->getReturnType()->shouldReturn('self');
    }

    public function it_exposes_if_return_type_is_nullable()
    {
        $this->isNullableReturnType()->shouldReturn(false);
    }
}
