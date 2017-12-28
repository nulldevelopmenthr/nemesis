<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeDeserializeMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use PhpSpec\ObjectBehavior;

class SpecDateTimeDeserializeMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeDeserializeMethodFactory::class);
    }

    public function it_will_create_spec_from_source_code_definition(
        ClassType $definition,
        DateTimeDeserializeMethod $method,
        ClassName $className
    ) {
        $definition->getMethods()->shouldBeCalled()->willReturn([$method]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);

        $this->create($definition)->shouldHaveCount(1);
    }
}
