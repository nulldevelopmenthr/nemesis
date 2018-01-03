<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSerializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecSerializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecSerializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSerializeMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_specification_for_a_object_with_a_single_property(
        ExampleMaker $exampleMaker,
        SpecSerializeMethod $method,
        Property $firstName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_can_be_serialized');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$firstName]);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $firstName->isObject()->shouldBeCalled()->willReturn(true);
        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('firstName'));

        $lines = [
            'public function it_can_be_serialized(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t".'$firstName->serialize()->shouldBeCalled()->willReturn(\'firstName\');',
            "\t"."\$this->serialize()->shouldReturn('firstName');",
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_a_object_with_multiple_properties(
        ExampleMaker $exampleMaker,
        SpecSerializeMethod $method,
        Property $firstName,
        Property $lastName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_can_be_serialized');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$firstName, $lastName]);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName, $lastName]);

        $firstName->isObject()->shouldBeCalled()->willReturn(true);
        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $lastName->isObject()->shouldBeCalled()->willReturn(true);
        $lastName->getName()->shouldBeCalled()->willReturn('lastName');
        $lastName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('firstName'));
        $exampleMaker->value($lastName)->shouldBeCalled()->willReturn(new SimpleExample('lastName'));

        $lines = [
            'public function it_can_be_serialized(MyVendor\User\UserFirstName $firstName, MyVendor\User\UserFirstName $lastName)',
            '{',
            "\t".'$firstName->serialize()->shouldBeCalled()->willReturn(\'firstName\');',
            "\t".'$lastName->serialize()->shouldBeCalled()->willReturn(\'lastName\');',
            "\t"."\$this->serialize()->shouldReturn(['firstName' => 'firstName', 'lastName' => 'lastName']);",
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_string_property(
        ExampleMaker $exampleMaker,
        SpecSerializeMethod $method,
        Property $firstName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_can_be_serialized');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $firstName->isObject()->shouldBeCalled()->willReturn(false);
        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('name'));

        $lines = [
            'public function it_can_be_serialized()',
            '{',
            "\t".'$this->serialize()->shouldReturn(\'name\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
