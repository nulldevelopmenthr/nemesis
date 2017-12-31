<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeDeserializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeDeserializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDateTimeDeserializeMethodGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeDeserializeMethodGenerator::class);
    }

    public function it_creates_spec_method(SpecDateTimeDeserializeMethod $method, ClassName $className)
    {
        $method->getName()->shouldBeCalled()->willReturn('it_is_deserializable');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->isStatic()->shouldBeCalled()->willReturn(false);

        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $className->getName()->shouldBeCalled()->willReturn('UserCreatedAt');

        $lines = [
            'public function it_is_deserializable()',
            '{',
            "\t".'$this->deserialize(\'2018-01-01T11:22:33+00:00\')->shouldReturnAnInstanceOf(UserCreatedAt::class);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
