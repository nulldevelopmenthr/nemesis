<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\AggregateRootIdGetterMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\CreateMethod;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class EventSourcedAggregateRootSourceFactorySpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $sourceFactory, DefinitionFactory $definitionFactory)
    {
        $this->beConstructedWith($sourceFactory, $definitionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventSourcedAggregateRootSourceFactory::class);
    }

    public function it_will_create_source_from_given_class_type_and_aggregate_root_id_param(
        ClassSourceFactory $sourceFactory,
        DefinitionFactory $definitionFactory,
        ClassType $classType,
        ImprovedClassSource $classSource,
        Parameter $parameter,
        ClassType $parameterClassType,
        CreateMethod $createMethod,
        AggregateRootIdGetterMethod $aggregateRootIdGetterMethod
    ) {
        $parameter->getName()->shouldBeCalled()->willReturn('paramName');

        $parameter
            ->hasType()
            ->shouldBeCalled()
            ->willReturn(true);

        $parameter
            ->getType()
            ->shouldBeCalled()
            ->willReturn($parameterClassType);

        $sourceFactory
            ->create($classType)
            ->shouldBeCalled()
            ->willReturn($classSource);

        $definitionFactory
            ->createBroadwayModelCreateMethod($classType, [$parameter])
            ->shouldBeCalled()
            ->willReturn($createMethod);

        $definitionFactory
            ->createBroadwayModelAggregateRootIdGetterMethod($parameter)
            ->shouldBeCalled()
            ->willReturn($aggregateRootIdGetterMethod);

        $this->create($classType, $parameter)
            ->shouldReturn($classSource);
    }
}
