<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class ReadProjectorSourceFactorySpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $sourceFactory, DefinitionFactory $definitionFactory)
    {
        $this->beConstructedWith($sourceFactory, $definitionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ReadProjectorSourceFactory::class);
    }

    public function it_will_create_source_from_given_class_type_and_constructor_params(
        ClassSourceFactory $sourceFactory,
        DefinitionFactory $definitionFactory,
        ClassType $classType,
        Parameter $parameter,
        ImprovedClassSource $classSource,
        ConstructorMethod $constructorMethod
    ) {
        $sourceFactory
            ->create($classType)
            ->willReturn($classSource);

        $definitionFactory
            ->createConstructorMethod([$parameter])
            ->shouldBeCalled()
            ->willReturn($constructorMethod);

        $parameter->getName()->shouldBeCalled()->willReturn('paramName');
        $parameter->getType()->shouldBeCalled()->willReturn(null);

        $this->create($classType, [$parameter])
            ->shouldReturn($classSource);
    }
}
