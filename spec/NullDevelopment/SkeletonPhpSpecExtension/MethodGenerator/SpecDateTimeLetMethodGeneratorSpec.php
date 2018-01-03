<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeLetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeLetMethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDateTimeLetMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeLetMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_let_method_for_string_properties(
        SpecDateTimeLetMethod $method
    ) {
        $method->getName()->shouldBeCalled()->willReturn('let');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);

        $lines = [
            'public function let()',
            '{',
            "\t".'$this->beConstructedWith(\'2018-01-01T11:22:33+00:00\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
