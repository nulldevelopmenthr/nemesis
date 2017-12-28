<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\DeserializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class DeserializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DeserializeMethodGenerator::class);
    }

    public function it_will_return_generated_code(SerializeMethod $method, Property $firstName)
    {
        $method->getName()->shouldBeCalled()->willReturn('deserialize');
        $method->isStatic()->shouldBeCalled()->willReturn(true);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('self');
        $method->isNullableReturnType()->shouldBeCalled()->willReturn(false);
        $method->getParameters()->shouldBeCalled()->willReturn([$firstName]);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $firstName->isObject()->shouldBeCalled()->willReturn(false);
        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('string');

        $lines = [
            'public static function deserialize(string $firstName): self',
            '{',
            "\t".'return new self($firstName);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
