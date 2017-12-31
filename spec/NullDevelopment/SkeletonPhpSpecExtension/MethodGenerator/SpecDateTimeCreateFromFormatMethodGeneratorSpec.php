<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeCreateFromFormatMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDateTimeCreateFromFormatMethodGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeCreateFromFormatMethodGenerator::class);
    }

    public function it_creates_spec_method(SpecDateTimeCreateFromFormatMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('it_can_be_created_from_custom_format');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->isStatic()->shouldBeCalled()->willReturn(false);

        $lines = [
            'public function it_can_be_created_from_custom_format()',
            '{',
            "\t".'$result = $this->createFromFormat(DateTime::ATOM, \'2018-01-01T11:22:33Z\');',
            "\t".'$result->__toString()->shouldReturn(\'2018-01-01T11:22:33+00:00\');',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
