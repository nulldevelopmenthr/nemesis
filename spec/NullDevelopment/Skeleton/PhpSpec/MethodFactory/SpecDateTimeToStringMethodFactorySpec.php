<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeToStringMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;
use PhpSpec\ObjectBehavior;

class SpecDateTimeToStringMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeToStringMethodFactory::class);
    }

    public function it_will_create_spec_from_source_code_definition(
        ClassDefinition $definition,
        DateTimeToStringMethod $method
    ) {
        $definition->getMethods()->shouldBeCalled()->willReturn([$method]);

        $this->create($definition)->shouldHaveCount(1);
    }
}
