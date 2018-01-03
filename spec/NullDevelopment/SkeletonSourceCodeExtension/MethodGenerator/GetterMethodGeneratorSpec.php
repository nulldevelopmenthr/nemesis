<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\GetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class GetterMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GetterMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_will_return_generated_code(GetterMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('getFirstName');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getPropertyName()->shouldBeCalled()->willReturn('firstName');

        $lines = [
            'public function getFirstName()',
            '{',
            "\t".'return $this->firstName;',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_generates_return_type(GetterMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('getFirstName');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('UserFirstName');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->isNullableReturnType()->shouldBeCalled()->willReturn(false);
        $method->getPropertyName()->shouldBeCalled()->willReturn('firstName');

        $lines = [
            'public function getFirstName(): UserFirstName',
            '{',
            "\t".'return $this->firstName;',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_generates_nullable_return_type_as_well(GetterMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('getFirstName');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->isNullableReturnType()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('UserFirstName');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->isNullableReturnType()->shouldBeCalled()->willReturn(true);
        $method->getPropertyName()->shouldBeCalled()->willReturn('firstName');

        $lines = [
            'public function getFirstName(): ?UserFirstName',
            '{',
            "\t".'return $this->firstName;',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
