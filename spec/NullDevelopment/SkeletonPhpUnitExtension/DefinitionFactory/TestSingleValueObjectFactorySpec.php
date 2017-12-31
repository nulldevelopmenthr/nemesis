<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSingleValueObject;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\SetUpMethodFactory;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestGetterMethodFactory;
use PhpSpec\ObjectBehavior;

class TestSingleValueObjectFactorySpec extends ObjectBehavior
{
    public function let(
        SetUpMethodFactory $setUpMethodFactory,

        TestGetterMethodFactory $testGetterMethodFactory
    ) {
        $this->beConstructedWith([$setUpMethodFactory, $testGetterMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSingleValueObjectFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        SingleValueObject $definition,
        SetUpMethodFactory $setUpMethodFactory,
        TestGetterMethodFactory $testGetterMethodFactory,
        ClassName $className
    ) {
        $definition->getFullClassName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getName()->shouldBeCalled()->willReturn($className);

        $setUpMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $testGetterMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromSingleValueObject($definition);
        $result->shouldReturnAnInstanceOf(TestSingleValueObject::class);

        $result->getFullClassName()->shouldReturn('Tests\\MyVendor\\UserEntityTest');
        $result->getParentFullClassName()->shouldReturn('PHPUnit\Framework\TestCase');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldHaveCount(1);
        $result->getMethods()->shouldReturn([]);
    }
}
