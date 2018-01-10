<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecDateTimeCreateFromFormatMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeCreateFromFormatMethod;
use PhpSpec\ObjectBehavior;

class SpecDateTimeCreateFromFormatMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeCreateFromFormatMethodFactory::class);
    }

    public function it_will_create_spec_from_source_code_definition(
        ClassDefinition $definition, DateTimeCreateFromFormatMethod $method
    ) {
        $definition->getMethods()->shouldBeCalled()->willReturn([$method]);

        $this->create($definition)->shouldHaveCount(1);
    }
}
