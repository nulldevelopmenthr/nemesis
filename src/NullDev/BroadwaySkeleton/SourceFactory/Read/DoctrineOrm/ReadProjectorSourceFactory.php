<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;

use Broadway\ReadModel\Projector;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\SourceFactory\SourceFactory;

class ReadProjectorSourceFactory implements SourceFactory
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

    public function create(ClassType $classType, array $parameters)
    {
        $source = $this->sourceFactory->create($classType);

        //Adds Projector as parent.
        $source->addParent(ClassType::createFromFullyQualified(Projector::class));
        $source->addConstructorMethod($this->definitionFactory->createConstructorMethod($parameters));
        foreach ($parameters as $parameter) {
            $source->addProperty(Property::createFromParameter($parameter));
        }

        return $source;
    }
}
