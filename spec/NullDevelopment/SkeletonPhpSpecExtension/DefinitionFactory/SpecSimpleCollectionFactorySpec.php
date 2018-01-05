<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSimpleCollection;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\InitializableMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\LetMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecGetterMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleCollection;
use PhpSpec\ObjectBehavior;

class SpecSimpleCollectionFactorySpec extends ObjectBehavior
{
    public function let(
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        SpecGetterMethodFactory $getterSpecMethodFactory
    ) {
        $this->beConstructedWith([$letMethodFactory, $initializableMethodFactory, $getterSpecMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleCollectionFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        SimpleCollection $definition,
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        SpecGetterMethodFactory $getterSpecMethodFactory,
        CollectionOf $collectionOf,
        ClassName $subjectUnderTest
    ) {
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getCollectionOf()->shouldBeCalled()->willReturn($collectionOf);
        $definition->getInstanceOf()->shouldBeCalled()->willReturn($subjectUnderTest);
        $definition->isSerializationEnabled()->shouldBeCalled()->willReturn(true);

        $letMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $initializableMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $getterSpecMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromSimpleCollection($definition);
        $result->shouldReturnAnInstanceOf(SpecSimpleCollection::class);

        $result->getInstanceOfFullName()->shouldReturn('spec\\MyVendor\\UserEntitySpec');
        $result->getParentFullClassName()->shouldReturn('PhpSpec\\ObjectBehavior');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldReturn([]);
        $result->getMethods()->shouldReturn([]);
    }
}
