<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Definition;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\SourceCode;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use PhpSpec\ObjectBehavior;

class SimpleCollectionSpec extends ObjectBehavior
{
    public function let(
        ClassName $name,
        ClassName $parent,
        InterfaceName $interfaceName1,
        TraitName $traitName1,
        Property $property1,
        ConstructorMethod $constructorMethod,
        GetterMethod $getterMethod1,
        CollectionOf $collectionOf
    ) {
        $this->beConstructedWith(
            $name,
            $parent,
            [$interfaceName1],
            [$traitName1],
            [$property1],
            [$constructorMethod, $getterMethod1],
            $collectionOf
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollection::class);
        $this->shouldImplement(SourceCode::class);
    }

    public function it_exposes_class_name(ClassName $name)
    {
        $this->getName()->shouldReturn($name);
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

    public function it_knows_there_are_methods()
    {
        $this->hasMethods()->shouldReturn(true);
    }

    public function it_exposes_defined_methods(ConstructorMethod $constructorMethod, GetterMethod $getterMethod1)
    {
        $this->getMethods()->shouldReturn([$constructorMethod, $getterMethod1]);
    }
}
