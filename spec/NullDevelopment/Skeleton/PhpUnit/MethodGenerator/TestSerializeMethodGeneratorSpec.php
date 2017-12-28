<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Method\TestSerializeMethod;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestSerializeMethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use PhpSpec\ObjectBehavior;

class TestSerializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSerializeMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_test_serialize_method_for_object_properties(
        TestSerializeMethod $method,
        Property $property
    ) {
        $method->getName()->shouldBeCalled()->willReturn('testSerialize');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getProperties()->shouldBeCalled()->willReturn([$property]);

        $property->isObject()->shouldBeCalled()->willReturn(true);
        $property->getName()->shouldBeCalled()->willReturn('firstName');

        $lines = [
            'public function testSerialize()',
            '{',
            "\t".'self::assertEquals($this->firstName->serialize(), $this->sut->serialize());',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
