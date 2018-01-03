<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecToStringMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;
use PhpSpec\ObjectBehavior;

class SpecToStringMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecToStringMethodFactory::class);
        $this->shouldImplement(PhpSpecMethodFactory::class);
    }

    public function it_will_create_to_string_spec_method_for_to_string_in_source_code_definition(
        ClassDefinition $definition,
        ToStringMethod $method,
        Property $firstName
    ) {
        $definition->getMethods()->shouldBeCalled()->willReturn([$method]);

        $method->getProperty()->shouldBeCalled()->willReturn($firstName);

        $this->create($definition)->shouldHaveCount(1);
    }

    public function it_returns_empty_list_when_no_to_string_found(ClassDefinition $definition)
    {
        $definition->getMethods()->shouldBeCalled()->willReturn([]);
        $this->create($definition)->shouldReturn([]);
    }

    public function it_creates_to_string_spec_method_from_given_to_string_method(ToStringMethod $method, Property $firstName)
    {
        $method->getProperty()->shouldBeCalled()->willReturn($firstName);

        $this->createFromToStringMethod($method)
            ->shouldReturnAnInstanceOf(SpecToStringMethod::class);
    }
}
