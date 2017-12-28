<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleEntity;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleEntityFactory;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\SetUpMethodFactory;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestGetterMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use PhpSpec\ObjectBehavior;

class TestSimpleEntityFactorySpec extends ObjectBehavior
{
    public function let(
        SetUpMethodFactory $setUpMethodFactory,

        TestGetterMethodFactory $testGetterMethodFactory
    ) {
        $this->beConstructedWith([$setUpMethodFactory, $testGetterMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleEntityFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        SimpleEntity $definition,
        SetUpMethodFactory $setUpMethodFactory,
        TestGetterMethodFactory $testGetterMethodFactory,
        ClassName $className
    ) {
        $definition->getFullClassName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getName()->shouldBeCalled()->willReturn($className);

        $setUpMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $testGetterMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromSimpleEntity($definition);
        $result->shouldReturnAnInstanceOf(TestSimpleEntity::class);

        $result->getFullClassName()->shouldReturn('Tests\\MyVendor\\UserEntityTest');
        $result->getParentFullClassName()->shouldReturn('PHPUnit\Framework\TestCase');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldHaveCount(1);
        $result->getMethods()->shouldReturn([]);
    }
}
