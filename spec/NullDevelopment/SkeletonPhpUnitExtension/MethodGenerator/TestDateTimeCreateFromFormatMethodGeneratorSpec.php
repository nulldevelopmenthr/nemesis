<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestDateTimeCreateFromFormatMethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;
use PhpSpec\ObjectBehavior;

class TestDateTimeCreateFromFormatMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeCreateFromFormatMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_let_method_for_object_properties(TestDateTimeCreateFromFormatMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('testCreateFromFormat');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');

        $lines = [
            'public function testCreateFromFormat()',
            '{',
            "\t".'$result = $this->sut::createFromFormat(DateTime::ATOM, \'2018-01-01T11:22:33Z\');',
            "\t".'self::assertEquals(\'2018-01-01T11:22:33+00:00\', $result->__toString());',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
