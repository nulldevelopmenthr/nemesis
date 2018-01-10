<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDeserializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestDeserializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class TestDeserializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDeserializeMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_let_method_for_object_properties(
        TestDeserializeMethod $method, Property $property, ClassName $className
    ) {
        $method->getName()->shouldBeCalled()->willReturn('testDeserialize');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getProperties()->shouldBeCalled()->willReturn([$property]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);

        $property->isObject()->shouldBeCalled()->willReturn(true);

        $className->getName()->shouldBeCalled()->willReturn('UserEntity');

        $lines = [
            'public function testDeserialize()',
            '{',
            "\t".'$serialized = json_encode($this->sut->serialize());',
            "\t".'self::assertEquals($this->sut, UserEntity::deserialize(json_decode($serialized,true)));',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
