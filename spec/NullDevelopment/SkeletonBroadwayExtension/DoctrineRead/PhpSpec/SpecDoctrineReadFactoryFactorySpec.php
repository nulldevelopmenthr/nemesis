<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadFactoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\InitializableMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\LetMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecGetterMethodFactory;
use PhpSpec\ObjectBehavior;

class SpecDoctrineReadFactoryFactorySpec extends ObjectBehavior
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
        $this->shouldHaveType(SpecDoctrineReadFactoryFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        DoctrineReadFactory $definition,
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

        $result = $this->createFromDoctrineReadFactory($definition);
        $result->shouldReturnAnInstanceOf(SpecDoctrineReadFactory::class);

        $result->getInstanceOfFullName()->shouldReturn('spec\\MyVendor\\UserEntitySpec');
        $result->getParentFullClassName()->shouldReturn('PhpSpec\\ObjectBehavior');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldReturn([]);
        $result->getMethods()->shouldReturn([]);
    }
}
