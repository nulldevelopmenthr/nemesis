<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\InitializableMethodFactory;
use PhpSpec\ObjectBehavior;

class InitializableMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InitializableMethodFactory::class);
    }

    public function it_will_create_initializable_method_from_source_code_class_definition(
        ClassDefinition $definition,
        ClassName $className,
        ClassName $parentClassName,
        InterfaceName $interfaceName1
    ) {
        $definition->getName()->shouldBeCalled()->willReturn($className);
        $definition->getParent()->shouldBeCalled()->willReturn($parentClassName);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([$interfaceName1]);

        $results = $this->create($definition);

        foreach ($results as $result) {
            $result->shouldBeAnInstanceOf(InitializableMethod::class);
        }
    }
}
