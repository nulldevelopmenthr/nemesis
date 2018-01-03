<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeDeserializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestDateTimeDeserializeMethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;
use PhpSpec\ObjectBehavior;

class TestDateTimeDeserializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeDeserializeMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_let_method_for_object_properties(TestDateTimeDeserializeMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('testDeserialize');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');

        $lines = [
            'public function testDeserialize()',
            '{',
            "\t".'self::assertEquals($this->sut, $this->sut->deserialize(\'2018-01-01T11:22:33+00:00\'));',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
