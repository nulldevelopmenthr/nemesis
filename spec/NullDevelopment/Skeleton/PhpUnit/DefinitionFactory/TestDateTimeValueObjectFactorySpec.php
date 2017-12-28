<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestDateTimeValueObject;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\SetUpMethodFactory;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestGetterMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use PhpSpec\ObjectBehavior;

class TestDateTimeValueObjectFactorySpec extends ObjectBehavior
{
    public function let(
        SetUpMethodFactory $setUpMethodFactory,

        TestGetterMethodFactory $testGetterMethodFactory
    ) {
        $this->beConstructedWith([$setUpMethodFactory, $testGetterMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeValueObjectFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        DateTimeValueObject $definition,
        SetUpMethodFactory $setUpMethodFactory,
        TestGetterMethodFactory $testGetterMethodFactory,
        ClassName $className
    ) {
        $definition->getFullClassName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getName()->shouldBeCalled()->willReturn($className);

        $setUpMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $testGetterMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromDateTimeValueObject($definition);
        $result->shouldReturnAnInstanceOf(TestDateTimeValueObject::class);

        $result->getFullClassName()->shouldReturn('Tests\\MyVendor\\UserEntityTest');
        $result->getParentFullClassName()->shouldReturn('PHPUnit\Framework\TestCase');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldHaveCount(1);
        $result->getMethods()->shouldReturn([]);
    }
}
