<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use PhpSpec\ObjectBehavior;

class ClassDefinitionSpec extends ObjectBehavior
{
    public function let(
        ClassName $name,
        ClassName $parent,
        InterfaceName $interfaceName1,
        TraitName $traitName1,
        Constant $constant1,
        ConstructorMethod $constructorMethod,
        Property $property1
    ) {
        $this->beConstructedWith(
            $name, $parent, [$interfaceName1], [$traitName1], [$constant1], [$property1], [$constructorMethod]
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ClassDefinition::class);
    }

    public function it_exposes_class_name(ClassName $name)
    {
        $this->getInstanceOf()->shouldReturn($name);
    }

    public function it_knows_there_is_a_parent()
    {
        $this->hasParent()->shouldReturn(true);
    }

    public function it_exposes_parent_class_name(ClassName $parent)
    {
        $this->getParent()->shouldReturn($parent);
    }

    public function it_knows_there_are_interfaces()
    {
        $this->hasInterfaces()->shouldReturn(true);
    }

    public function it_exposes_defined_interfaces(InterfaceName $interfaceName1)
    {
        $this->getInterfaces()->shouldReturn([$interfaceName1]);
    }

    public function it_knows_there_are_traits()
    {
        $this->hasTraits()->shouldReturn(true);
    }

    public function it_exposes_defined_traits(TraitName $traitName1)
    {
        $this->getTraits()->shouldReturn([$traitName1]);
    }

    public function it_knows_constructor_is_defined()
    {
        $this->hasConstructorMethod()->shouldReturn(true);
    }

    public function it_exposes_constructor(ConstructorMethod $constructorMethod)
    {
        $this->getConstructorMethod()->shouldReturn($constructorMethod);
    }

    public function it_knows_there_are_properties()
    {
        $this->hasProperties()->shouldReturn(true);
    }

    public function it_exposes_defined_properties(Property $property1)
    {
        $this->getProperties()->shouldReturn([$property1]);
    }
}
