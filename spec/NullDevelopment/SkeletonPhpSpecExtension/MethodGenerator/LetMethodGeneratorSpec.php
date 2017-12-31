<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\LetMethodGenerator;
use PhpSpec\ObjectBehavior;

class LetMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LetMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_let_method_for_string_properties(
        ExampleMaker $exampleMaker,
        LetMethod $method,
        Property $property
    ) {
        $method->getName()->shouldBeCalled()->willReturn('let');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$property]);

        $property->isObject()->shouldBeCalled()->willReturn(false);
        $property->getName()->shouldBeCalled()->willReturn('name');

        $exampleMaker->value($property)->shouldBeCalled()->willReturn(new SimpleExample('name'));

        $lines = [
            'public function let()',
            '{',
            "\t".'$this->beConstructedWith($name = \'name\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_let_method_for_object_properties(
        LetMethod $method,
        Property $property
    ) {
        $method->getName()->shouldBeCalled()->willReturn('let');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$property]);

        $property->isObject()->shouldBeCalled()->willReturn(true);
        $property->getName()->shouldBeCalled()->willReturn('firstName');
        $property->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $lines = [
            'public function let(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t".'$this->beConstructedWith($firstName);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_let_method_for_combination_of_properties(
        ExampleMaker $exampleMaker,
        LetMethod $method,
        Property $propertyString,
        Property $propertyObject
    ) {
        $method->getName()->shouldBeCalled()->willReturn('let');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$propertyString, $propertyObject]);

        $propertyString->isObject()->shouldBeCalled()->willReturn(false);
        $propertyString->getName()->shouldBeCalled()->willReturn('name');

        $exampleMaker->value($propertyString)->shouldBeCalled()->willReturn(new SimpleExample('name'));

        $propertyObject->isObject()->shouldBeCalled()->willReturn(true);
        $propertyObject->getName()->shouldBeCalled()->willReturn('firstName');
        $propertyObject->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $lines = [
            'public function let(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t".'$this->beConstructedWith($name = \'name\', $firstName);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
