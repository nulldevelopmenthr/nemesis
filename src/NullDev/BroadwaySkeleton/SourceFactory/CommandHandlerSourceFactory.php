<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\LoadAggregateRootModelMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\SaveAggregateRootModelMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\SourceFactory\SourceFactory;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;

/**
 * @see CommandHandlerSourceFactorySpec
 * @see CommandHandlerSourceFactoryTest
 */
class CommandHandlerSourceFactory implements SourceFactory
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

    public function create(
        CommandHandlerClassName $handlerClassName,
        RootRepositoryClassName $repositoryClassName,
        RootIdClassName $idClassName,
        RootModelClassName $modelClassName
    ): ImprovedClassSource {
        $source = $this->sourceFactory->create($handlerClassName);

        $parameters = [
            new Parameter('repository', $repositoryClassName),
        ];

        //Add constructor method.
        $source->addConstructorMethod($this->definitionFactory->createConstructorMethod($parameters));
        foreach ($parameters as $parameter) {
            $source->addProperty(Property::createFromParameter($parameter));
        }
        $source->addMethod(new LoadAggregateRootModelMethod($idClassName, $modelClassName));
        $source->addMethod(new SaveAggregateRootModelMethod($modelClassName));
        $source->addImport($idClassName);
        $source->addImport($modelClassName);

        return $source;
    }
}
