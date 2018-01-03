<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestGetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class TestGetterMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestGetterMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_test_getter_method_for_object_properties(
        TestGetterMethod $method,
        Property $property
    ) {
        $method->getName()->shouldBeCalled()->willReturn('testGetFirstName');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getProperty()->shouldBeCalled()->willReturn($property);
        $method->getMethodUnderTest()->shouldBeCalled()->willReturn('getFirstName');

        $property->getName()->shouldBeCalled()->willReturn('firstName');

        $lines = [
            'public function testGetFirstName()',
            '{',
            "\t".'self::assertSame($this->firstName, $this->sut->getFirstName());',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
