<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestUuidV4Identifier;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\SetUpMethodFactory;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestGetterMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;
use PhpSpec\ObjectBehavior;

class TestUuidV4IdentifierFactorySpec extends ObjectBehavior
{
    public function let(SetUpMethodFactory $setUpMethodFactory, TestGetterMethodFactory $testGetterMethodFactory)
    {
        $this->beConstructedWith([$setUpMethodFactory, $testGetterMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestUuidV4IdentifierFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        UuidV4Identifier $definition,
        SetUpMethodFactory $setUpMethodFactory,
        TestGetterMethodFactory $testGetterMethodFactory,
        ClassName $className
    ) {
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getInstanceOf()->shouldBeCalled()->willReturn($className);

        $setUpMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $testGetterMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromUuidV4Identifier($definition);
        $result->shouldReturnAnInstanceOf(TestUuidV4Identifier::class);

        $result->getInstanceOfFullName()->shouldReturn('Tests\\MyVendor\\UserEntityTest');
        $result->getParentFullClassName()->shouldReturn('PHPUnit\Framework\TestCase');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldHaveCount(1);
        $result->getMethods()->shouldReturn([]);
    }
}
