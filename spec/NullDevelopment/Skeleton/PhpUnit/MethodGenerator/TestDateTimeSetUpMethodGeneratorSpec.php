<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeSetUpMethod;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDateTimeSetUpMethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use PhpSpec\ObjectBehavior;

class TestDateTimeSetUpMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeSetUpMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_let_method_for_object_properties(
        TestDateTimeSetUpMethod $method,
        ClassName $className
    ) {
        $method->getName()->shouldBeCalled()->willReturn('setUp');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getClassName()->shouldBeCalled()->willReturn($className);

        $className->getName()->shouldBeCalled()->willReturn('UserFirstName');

        $lines = [
            'public function setUp()',
            '{',
            "\t".'$this->sut = new UserFirstName(\'2018-01-01T11:22:33+00:00\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
