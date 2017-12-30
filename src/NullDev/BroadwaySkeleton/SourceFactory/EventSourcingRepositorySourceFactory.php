<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\SourceFactory;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;

class EventSourcingRepositorySourceFactory
{
    /** @var ClassSourceFactory */
    private $sourceFactory;

    /** @var DefinitionFactory */
    private $definitionFactory;

    public function __construct(ClassSourceFactory $sourceFactory, DefinitionFactory $definitionFactory)
    {
        $this->sourceFactory     = $sourceFactory;
        $this->definitionFactory = $definitionFactory;
    }

    public function create(ClassType $classType, ClassType $modelClassType)
    {
        $source = $this->sourceFactory->create($classType);

        $source->addParent(ClassType::createFromFullyQualified(EventSourcingRepository::class));

        $source->addImport(
            ClassType::createFromFullyQualified(PublicConstructorAggregateFactory::class)
        );
        $source->addImport(
            ClassType::createFromFullyQualified(EventBus::class)
        );
        $source->addImport(
            ClassType::createFromFullyQualified(EventStore::class)
        );

        //Add aggregate root id as property.
        //Add constructor which calls parent constructor method.
        $source->addMethod(
            $this->definitionFactory->createBroadwayModelRepositoryConstructorMethod($modelClassType)
        );

        return $source;
    }
}
