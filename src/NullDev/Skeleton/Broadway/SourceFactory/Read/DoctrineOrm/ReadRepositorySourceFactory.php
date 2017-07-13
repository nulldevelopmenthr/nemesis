<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Broadway\SourceFactory\Read\DoctrineOrm;

use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\SourceFactory\SourceFactory;

class ReadRepositorySourceFactory implements SourceFactory
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

    public function create(ClassType $classType)
    {
        $source = $this->sourceFactory->create($classType);

        //Adds EntityRepository as parent.
        $source->addParent(ClassType::create('NullDev\Theater\DoctrineOrm\EntityRepository'));

        return $source;
    }
}
