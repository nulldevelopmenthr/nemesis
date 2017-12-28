<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Definition;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleCollection;
use NullDevelopment\Skeleton\PhpUnit\Method\SetUpMethod;
use PhpSpec\ObjectBehavior;

class TestSimpleCollectionSpec extends ObjectBehavior
{
    public function let(
        ClassName $name,
        ClassName $parent,
        InterfaceName $interfaceName1,
        TraitName $traitName1,
        Property $property1,
        SetUpMethod $setUpMethod,
        CollectionOf $collectionOf,
        ClassName $subjectUnderTest
    ) {
        $this->beConstructedWith(
            $name,
            $parent,
            [$interfaceName1],
            [$traitName1],
            [$property1],
            [$setUpMethod],
            $collectionOf,
            $subjectUnderTest
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleCollection::class);
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

    public function it_knows_constructor_is_not_defined()
    {
        $this->hasConstructorMethod()->shouldReturn(false);
    }

    public function it_exposes_constructor()
    {
        $this->getConstructorMethod()->shouldReturn(null);
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

    public function it_exposes_defined_methods(SetUpMethod $setUpMethod)
    {
        $this->getMethods()->shouldReturn([$setUpMethod]);
    }
}
