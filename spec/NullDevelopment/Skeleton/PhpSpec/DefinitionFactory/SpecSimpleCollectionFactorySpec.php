<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionFactory;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleCollection;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\GetterSpecMethodFactory;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\InitializableMethodFactory;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\LetMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use PhpSpec\ObjectBehavior;

class SpecSimpleCollectionFactorySpec extends ObjectBehavior
{
    public function let(
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        GetterSpecMethodFactory $getterSpecMethodFactory
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
        GetterSpecMethodFactory $getterSpecMethodFactory,
        CollectionOf $collectionOf,
        ClassName $subjectUnderTest
    ) {
        $definition->getFullClassName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getCollectionOf()->shouldBeCalled()->willReturn($collectionOf);
        $definition->getName()->shouldBeCalled()->willReturn($subjectUnderTest);

        $letMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $initializableMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $getterSpecMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromSimpleCollection($definition);
        $result->shouldReturnAnInstanceOf(SpecSimpleCollection::class);

        $result->getFullClassName()->shouldReturn('spec\\MyVendor\\UserEntitySpec');
        $result->getParentFullClassName()->shouldReturn('PhpSpec\\ObjectBehavior');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldReturn([]);
        $result->getMethods()->shouldReturn([]);
    }
}
