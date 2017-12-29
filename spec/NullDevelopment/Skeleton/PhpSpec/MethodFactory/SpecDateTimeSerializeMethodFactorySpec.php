<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeSerializeMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;
use PhpSpec\ObjectBehavior;

class SpecDateTimeSerializeMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeSerializeMethodFactory::class);
    }

    public function it_will_create_spec_from_source_code_definition(
        ClassDefinition $definition,
        DateTimeSerializeMethod $method
    ) {
        $definition->getMethods()->shouldBeCalled()->willReturn([$method]);

        $this->create($definition)->shouldHaveCount(1);
    }
}
