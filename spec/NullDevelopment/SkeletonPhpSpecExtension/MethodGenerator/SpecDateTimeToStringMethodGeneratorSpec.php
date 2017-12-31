<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeToStringMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDateTimeToStringMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeToStringMethodGenerator::class);
    }

    public function it_creates_spec_method(SpecDateTimeToStringMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('it_is_castable_to_string');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);

        $lines = [
            'public function it_is_castable_to_string()',
            '{',
            "\t".'$this->__toString()->shouldReturn(\'2018-01-01T11:22:33+00:00\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
