<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\LetMethodFactory;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use PhpSpec\ObjectBehavior;

class LetMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LetMethodFactory::class);
        $this->shouldImplement(PhpSpecMethodFactory::class);
    }

    public function it_will_create_let_method_if_source_code_definition_had_one(
        ClassType $definition,
        ConstructorMethod $constructorMethod,
        Property $property1
    ) {
        $definition->getConstructorMethod()->shouldBeCalled()->willReturn($constructorMethod);
        $constructorMethod->getParameters()->shouldBeCalled()->willReturn([$property1]);

        $this->create($definition)->shouldHaveCount(1);
    }

    public function it_returns_empty_list_when_source_code_has_no_constructor_defined(
        ClassType $definition
    ) {
        $definition->getConstructorMethod()->shouldBeCalled()->willReturn(null);

        $this->create($definition)->shouldReturn([]);
    }

    public function it_creates_constructor_method_into_let_method(
        ConstructorMethod $constructorMethod,
        Property $property1
    ) {
        $constructorMethod->getParameters()->shouldBeCalled()->willReturn([$property1]);

        $this->createFromConstructorMethod($constructorMethod)
            ->shouldReturnAnInstanceOf(LetMethod::class);
    }
}
