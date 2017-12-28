<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\SerializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class SerializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SerializeMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_will_return_generated_code(SerializeMethod $method, Property $firstName)
    {
        $method->getName()->shouldBeCalled()->willReturn('serialize');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('string');
        $method->isNullableReturnType()->shouldBeCalled()->willReturn(false);
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $firstName->isObject()->shouldBeCalled()->willReturn(false);
        $firstName->getName()->shouldBeCalled()->willReturn('firstName');

        $lines = [
            'public function serialize(): string',
            '{',
            "\t".'return $this->firstName;',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
