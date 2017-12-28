<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDeserializeMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDeserializeMethodFactory;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use PhpSpec\ObjectBehavior;

class SpecDeserializeMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDeserializeMethodFactory::class);
        $this->shouldImplement(PhpSpecMethodFactory::class);
    }

    public function it_will_create_deserialize_spec_method_for_deserialize_in_source_code_definition(
        ClassType $definition,
        DeserializeMethod $method,
        ClassName $className,
        Property $firstName
    ) {
        $definition->getMethods()->shouldBeCalled()->willReturn([$method]);

        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $this->create($definition)->shouldHaveCount(1);
    }

    public function it_returns_empty_list_when_no_deserialize_found(ClassType $definition)
    {
        $definition->getMethods()->shouldBeCalled()->willReturn([]);
        $this->create($definition)->shouldReturn([]);
    }

    public function it_creates_deserialize_spec_method_from_given_deserialize_method(
        DeserializeMethod $method,
        ClassName $className,
        Property $firstName
    ) {
        $method->getClassName()->shouldBeCalled()->willReturn($className);
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $this->createFromDeserializeMethod($method)
            ->shouldReturnAnInstanceOf(SpecDeserializeMethod::class);
    }
}
