<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeSerializeMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDateTimeSerializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDateTimeSerializeMethodGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeSerializeMethodGenerator::class);
    }

    public function it_creates_spec_method(SpecDateTimeSerializeMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('it_is_serializable');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->isStatic()->shouldBeCalled()->willReturn(false);

        $lines = [
            'public function it_is_serializable()',
            '{',
            "\t".'$this->serialize()->shouldReturn(\'2018-01-01T11:22:33+00:00\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
