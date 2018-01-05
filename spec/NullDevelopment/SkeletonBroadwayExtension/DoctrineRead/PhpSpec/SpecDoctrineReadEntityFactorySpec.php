<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntity;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadEntity;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\InitializableMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\LetMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecGetterMethodFactory;
use PhpSpec\ObjectBehavior;

class SpecDoctrineReadEntityFactorySpec extends ObjectBehavior
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
        $this->shouldHaveType(SpecDoctrineReadEntityFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        DoctrineReadEntity $definition,
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        SpecGetterMethodFactory $getterSpecMethodFactory,
        ClassName $subjectUnderTest
    ) {
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');
        $definition->getInstanceOf()->shouldBeCalled()->willReturn($subjectUnderTest);

        $letMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $initializableMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $getterSpecMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromDoctrineReadEntity($definition);
        $result->shouldReturnAnInstanceOf(SpecDoctrineReadEntity::class);

        $result->getInstanceOfFullName()->shouldReturn('spec\\MyVendor\\UserEntitySpec');
        $result->getParentFullClassName()->shouldReturn('PhpSpec\\ObjectBehavior');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldReturn([]);
        $result->getMethods()->shouldReturn([]);
    }
}
