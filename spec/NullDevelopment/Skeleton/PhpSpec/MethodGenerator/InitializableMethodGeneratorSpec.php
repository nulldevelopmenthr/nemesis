<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\InitializableMethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use PhpSpec\ObjectBehavior;

class InitializableMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InitializableMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_initializable_method(InitializableMethod $method, ClassName $className)
    {
        $method->getName()->shouldBeCalled()->willReturn('it_is_initializable');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getParentName()->shouldBeCalled()->willReturn(null);
        $method->getInterfaces()->shouldBeCalled()->willReturn([]);

        $className->getName()->shouldBeCalled()->willReturn('User');

        $lines = [
            'public function it_is_initializable()',
            '{',
            "\t".'$this->shouldHaveType(User::class);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_initializable_method_with_parent(
        InitializableMethod $method,
        ClassName $className,
        ClassName $parentName
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_is_initializable');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getParentName()->shouldBeCalled()->willReturn($parentName);
        $method->getInterfaces()->shouldBeCalled()->willReturn([]);

        $className->getName()->shouldBeCalled()->willReturn('User');
        $parentName->getName()->shouldBeCalled()->willReturn('BaseUser');

        $lines = [
            'public function it_is_initializable()',
            '{',
            "\t".'$this->shouldHaveType(User::class);',
            "\t".'$this->shouldHaveType(BaseUser::class);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }

    public function it_creates_initializable_method_with_interfaces(
        InitializableMethod $method,
        ClassName $className,
        InterfaceName $interfaceName1
    ) {
        $method->getName()->shouldBeCalled()->willReturn('it_is_initializable');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getParentName()->shouldBeCalled()->willReturn(null);
        $method->getInterfaces()->shouldBeCalled()->willReturn([$interfaceName1]);

        $className->getName()->shouldBeCalled()->willReturn('User');
        $interfaceName1->getName()->shouldBeCalled()->willReturn('SomeInterface');

        $lines = [
            'public function it_is_initializable()',
            '{',
            "\t".'$this->shouldHaveType(User::class);',
            "\t".'$this->shouldImplement(SomeInterface::class);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
