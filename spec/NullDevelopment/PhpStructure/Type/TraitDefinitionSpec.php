<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\PhpStructure\Type\TraitDefinition;
use PhpSpec\ObjectBehavior;

class TraitDefinitionSpec extends ObjectBehavior
{
    public function let(
        TraitName $name, TraitName $trait1, Constant $constant1, Property $property1, Method $method1
    ) {
        $this->beConstructedWith($name, [$trait1], [$constant1], [$property1], [$method1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TraitDefinition::class);
    }

    public function it_exposes_trait_name(TraitName $name)
    {
        $this->getInstanceOf()->shouldReturn($name);
    }

    public function it_exposes_traits_that_this_trait_uses(TraitName $trait1)
    {
        $this->getTraits()->shouldReturn([$trait1]);
    }

    public function it_exposes_constants_trait_defines(Constant $constant1)
    {
        $this->getConstants()->shouldReturn([$constant1]);
    }

    public function it_exposes_properties_trait_defines(Property $property1)
    {
        $this->getProperties()->shouldReturn([$property1]);
    }

    public function it_exposes_methods_trait_defines(Method $method1)
    {
        $this->getMethods()->shouldReturn([$method1]);
    }
}
