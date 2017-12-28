<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleIdentifier;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleIdentifierFactory;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\SetUpMethodFactory;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestGetterMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use PhpSpec\ObjectBehavior;

class TestSimpleIdentifierFactorySpec extends ObjectBehavior
{
    public function let(
        SetUpMethodFactory $setUpMethodFactory,

        TestGetterMethodFactory $testGetterMethodFactory
    ) {
        $this->beConstructedWith([$setUpMethodFactory, $testGetterMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleIdentifierFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        SimpleIdentifier $definition,
        SetUpMethodFactory $setUpMethodFactory,
        TestGetterMethodFactory $testGetterMethodFactory,
        ClassName $className
    ) {
        $definition->getFullClassName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getName()->shouldBeCalled()->willReturn($className);

        $setUpMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $testGetterMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromSimpleIdentifier($definition);
        $result->shouldReturnAnInstanceOf(TestSimpleIdentifier::class);

        $result->getFullClassName()->shouldReturn('Tests\\MyVendor\\UserEntityTest');
        $result->getParentFullClassName()->shouldReturn('PHPUnit\Framework\TestCase');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldHaveCount(1);
        $result->getMethods()->shouldReturn([]);
    }
}
