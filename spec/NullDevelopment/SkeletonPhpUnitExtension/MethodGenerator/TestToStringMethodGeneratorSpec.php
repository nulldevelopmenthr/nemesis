<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestToStringMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestToStringMethodGenerator;
use PhpSpec\ObjectBehavior;

class TestToStringMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestToStringMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_test_to_string_method_for_object_properties(
        TestToStringMethod $method,
        Property $property
    ) {
        $method->getName()->shouldBeCalled()->willReturn('testToString');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getProperty()->shouldBeCalled()->willReturn($property);

        $property->getName()->shouldBeCalled()->willReturn('firstName');
        $property->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');

        $lines = [
            'public function testToString()',
            '{',
            "\t".'self::assertSame($this->firstName, $this->sut->__toString());',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
