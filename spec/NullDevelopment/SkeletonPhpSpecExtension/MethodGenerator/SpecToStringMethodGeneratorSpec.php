<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecToStringMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecToStringMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecToStringMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_specification_for_a_object_with_a_single_property(
        ExampleMaker $exampleMaker, SpecToStringMethod $method, Property $firstName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_is_castable_to_string');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$firstName]);
        $method->getProperty()->shouldBeCalled()->willReturn($firstName);

        $firstName->isObject()->shouldBeCalled()->willReturn(true);
        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('firstName'));

        $lines = [
            'public function it_is_castable_to_string(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t"."\$this->__toString()->shouldReturn('firstName');",
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_string_property(
        ExampleMaker $exampleMaker, SpecToStringMethod $method, Property $firstName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_is_castable_to_string');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getProperty()->shouldBeCalled()->willReturn($firstName);

        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('string');

        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('name'));

        $lines = [
            'public function it_is_castable_to_string()',
            '{',
            "\t".'$this->__toString()->shouldReturn(\'name\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_integer_property(
        ExampleMaker $exampleMaker, SpecToStringMethod $method, Property $amount
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_is_castable_to_string');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getProperty()->shouldBeCalled()->willReturn($amount);

        $amount->getInstanceFullName()->shouldBeCalled()->willReturn('int');

        $exampleMaker->value($amount)->shouldBeCalled()->willReturn(new SimpleExample(1));

        $lines = [
            'public function it_is_castable_to_string()',
            '{',
            "\t".'$this->__toString()->shouldReturn(\'1\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
