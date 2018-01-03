<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ToStringMethodGenerator;
use PhpSpec\ObjectBehavior;

class ToStringMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ToStringMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_will_return_generated_code(ToStringMethod $method, Property $firstName)
    {
        $method->getName()->shouldBeCalled()->willReturn('__toString');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('string');
        $method->isNullableReturnType()->shouldBeCalled()->willReturn(false);
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getProperty()->shouldBeCalled()->willReturn($firstName);

        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('string');

        $lines = [
            'public function __toString(): string',
            '{',
            "\t".'return $this->firstName;',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
