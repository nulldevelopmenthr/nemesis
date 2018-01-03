<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecGetterMethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecGetterMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecGetterMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_specification_for_a_object_getter(SpecGetterMethod $method, Property $property)
    {
        $method->getName()->shouldBeCalled()->willReturn('it_exposes_first_name');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$property]);
        $method->getMethodUnderTest()->shouldBeCalled()->willReturn('getFirstName');
        $method->getPropertyName()->shouldBeCalled()->willReturn('firstName');
        $method->getProperty()->shouldBeCalled()->willReturn($property);

        $property->isObject()->shouldBeCalled()->willReturn(true);
        $property->getName()->shouldBeCalled()->willReturn('firstName');
        $property->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $lines = [
            'public function it_exposes_first_name(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t".'$this->getFirstName()->shouldReturn($firstName);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_string_property(
        ExampleMaker $exampleMaker,
        SpecGetterMethod $method,
        Property $property
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_exposes_name');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getMethodUnderTest()->shouldBeCalled()->willReturn('getName');
        $method->getProperty()->shouldBeCalled()->willReturn($property);

        $property->isObject()->shouldBeCalled()->willReturn(false);
        $exampleMaker->value($property)->shouldBeCalled()->willReturn(new SimpleExample('name'));

        $lines = [
            'public function it_exposes_name()',
            '{',
            "\t".'$this->getName()->shouldReturn(\'name\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_int_property(
        ExampleMaker $exampleMaker,
        SpecGetterMethod $method,
        Property $property
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_exposes_amount');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getMethodUnderTest()->shouldBeCalled()->willReturn('getAmount');
        $method->getProperty()->shouldBeCalled()->willReturn($property);

        $property->isObject()->shouldBeCalled()->willReturn(false);

        $exampleMaker->value($property)->shouldBeCalled()->willReturn(new SimpleExample(1));

        $lines = [
            'public function it_exposes_amount()',
            '{',
            "\t".'$this->getAmount()->shouldReturn(1);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
