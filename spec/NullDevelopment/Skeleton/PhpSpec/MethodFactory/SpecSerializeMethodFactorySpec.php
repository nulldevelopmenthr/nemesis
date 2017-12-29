<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecSerializeMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecSerializeMethodFactory;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use PhpSpec\ObjectBehavior;

class SpecSerializeMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSerializeMethodFactory::class);
        $this->shouldImplement(PhpSpecMethodFactory::class);
    }

    public function it_will_create_serialize_spec_method_for_serialize_in_source_code_definition(
        ClassDefinition $definition,
        SerializeMethod $method,
        Property $firstName
    ) {
        $definition->getMethods()->shouldBeCalled()->willReturn([$method]);

        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $this->create($definition)->shouldHaveCount(1);
    }

    public function it_returns_empty_list_when_no_serialize_found(ClassDefinition $definition)
    {
        $definition->getMethods()->shouldBeCalled()->willReturn([]);
        $this->create($definition)->shouldReturn([]);
    }

    public function it_creates_serialize_spec_method_from_given_serialize_method(SerializeMethod $method, Property $firstName)
    {
        $method->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $this->createFromSerializeMethod($method)
            ->shouldReturnAnInstanceOf(SpecSerializeMethod::class);
    }
}
