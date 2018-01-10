<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\LetMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
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
        ClassDefinition $definition, ConstructorMethod $constructorMethod, Property $property1
    ) {
        $definition->getConstructorMethod()->shouldBeCalled()->willReturn($constructorMethod);
        $constructorMethod->getParameters()->shouldBeCalled()->willReturn([$property1]);

        $this->create($definition)->shouldHaveCount(1);
    }

    public function it_returns_empty_list_when_source_code_has_no_constructor_defined(ClassDefinition $definition)
    {
        $definition->getConstructorMethod()->shouldBeCalled()->willReturn(null);

        $this->create($definition)->shouldReturn([]);
    }

    public function it_creates_constructor_method_into_let_method(
        ConstructorMethod $constructorMethod, Property $property1
    ) {
        $constructorMethod->getParameters()->shouldBeCalled()->willReturn([$property1]);

        $this->createFromConstructorMethod($constructorMethod)
            ->shouldReturnAnInstanceOf(LetMethod::class);
    }
}
