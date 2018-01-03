<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use PhpSpec\ObjectBehavior;

class InterfaceDefinitionSpec extends ObjectBehavior
{
    public function let(InterfaceName $name, InterfaceName $parentName, Constant $constant1, Method $method1)
    {
        $this->beConstructedWith($name, $parentName, [$constant1], [$method1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceDefinition::class);
    }

    public function it_will_expose_name(InterfaceName $name)
    {
        $this->getInstanceOf()->shouldReturn($name);
    }

    public function it_will_expose_parent_name(InterfaceName $parentName)
    {
        $this->getParentName()->shouldReturn($parentName);
    }

    public function it_will_expose_constants(Constant $constant1)
    {
        $this->getConstants()->shouldReturn([$constant1]);
    }

    public function it_will_expose_methods(Method $method1)
    {
        $this->getMethods()->shouldReturn([$method1]);
    }
}
