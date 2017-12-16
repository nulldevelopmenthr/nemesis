<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\Behaviour\Method;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use PhpSpec\ObjectBehavior;

class ConstructorMethodSpec extends ObjectBehavior
{
    public function let(MethodParameter $parameter1, MethodParameter $parameter2)
    {
        $this->beConstructedWith([$parameter1, $parameter2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConstructorMethod::class);
    }

    public function it_exposes_parameters(MethodParameter $parameter1, MethodParameter $parameter2)
    {
        $this->getParameters()->shouldReturn([$parameter1, $parameter2]);
    }
}
