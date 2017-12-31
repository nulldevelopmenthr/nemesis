<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeSerializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeSerializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDateTimeSerializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

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
