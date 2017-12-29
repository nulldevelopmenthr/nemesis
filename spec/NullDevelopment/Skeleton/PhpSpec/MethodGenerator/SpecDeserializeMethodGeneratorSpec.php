<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDeserializeMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDeserializeMethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDeserializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDeserializeMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_specification_for_a_object_with_a_single_property(
        ExampleMaker $exampleMaker,
        SpecDeserializeMethod $method,
        ClassName $className,
        Property $firstName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_can_be_deserialized');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$firstName]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $firstName->isObject()->shouldBeCalled()->willReturn(true);
        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $className->getName()->shouldBeCalled()->willReturn('UserEntity');

        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('firstName'));

        $lines = [
            'public function it_can_be_deserialized(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t".'$input = \'firstName\';',
            '',
            "\t".'$this->deserialize($input)->shouldReturnAnInstanceOf(UserEntity::class);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_a_object_with_multiple_properties(
        ExampleMaker $exampleMaker,
        SpecDeserializeMethod $method,
        ClassName $className,
        Property $firstName,
        Property $lastName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_can_be_deserialized');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$firstName, $lastName]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName, $lastName]);

        $firstName->isObject()->shouldBeCalled()->willReturn(true);
        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $lastName->isObject()->shouldBeCalled()->willReturn(true);
        $lastName->getName()->shouldBeCalled()->willReturn('lastName');
        $lastName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $className->getName()->shouldBeCalled()->willReturn('UserEntity');

        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('firstName'));
        $exampleMaker->value($lastName)->shouldBeCalled()->willReturn(new SimpleExample('lastName'));

        $lines = [
            'public function it_can_be_deserialized(MyVendor\User\UserFirstName $firstName, MyVendor\User\UserFirstName $lastName)',
            '{',
            "\t".'$input = [\'firstName\' => \'firstName\', \'lastName\' => \'lastName\'];',
            '',
            "\t".'$this->deserialize($input)->shouldReturnAnInstanceOf(UserEntity::class);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_specification_for_string_property(
        ExampleMaker $exampleMaker,
        SpecDeserializeMethod $method,
        ClassName $className,
        Property $firstName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_can_be_deserialized');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $className->getName()->shouldBeCalled()->willReturn('UserEntity');

        $exampleMaker->value($firstName)->shouldBeCalled()->willReturn(new SimpleExample('name'));

        $lines = [
            'public function it_can_be_deserialized()',
            '{',
            "\t".'$input = \'name\';',
            '',
            "\t".'$this->deserialize($input)->shouldReturnAnInstanceOf(UserEntity::class);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
