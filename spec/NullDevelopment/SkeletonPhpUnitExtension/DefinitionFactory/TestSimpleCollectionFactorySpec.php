<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleCollection;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\SetUpMethodFactory;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestGetterMethodFactory;
use PhpSpec\ObjectBehavior;

class TestSimpleCollectionFactorySpec extends ObjectBehavior
{
    public function let(SetUpMethodFactory $setUpMethodFactory, TestGetterMethodFactory $testGetterMethodFactory)
    {
        $this->beConstructedWith([$setUpMethodFactory, $testGetterMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleCollectionFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        SimpleCollection $definition,
        SetUpMethodFactory $setUpMethodFactory,
        TestGetterMethodFactory $testGetterMethodFactory,
        ClassName $className,
        CollectionOf $collectionOf,
        ClassName $subjectUnderTest
    ) {
        $definition->getFullClassName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getName()->shouldBeCalled()->willReturn($className);
        $definition->getCollectionOf()->shouldBeCalled()->willReturn($collectionOf);
        $definition->getName()->shouldBeCalled()->willReturn($subjectUnderTest);

        $setUpMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $testGetterMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromSimpleCollection($definition);
        $result->shouldReturnAnInstanceOf(TestSimpleCollection::class);

        $result->getFullClassName()->shouldReturn('Tests\\MyVendor\\UserEntityTest');
        $result->getParentFullClassName()->shouldReturn('PHPUnit\Framework\TestCase');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldHaveCount(1);
        $result->getMethods()->shouldReturn([]);
    }
}
