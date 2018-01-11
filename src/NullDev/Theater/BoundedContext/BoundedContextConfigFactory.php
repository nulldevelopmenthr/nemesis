<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use NullDev\Theater\Naming\EventClassName;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see BoundedContextConfigFactorySpec
 * @see BoundedContextConfigFactoryTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BoundedContextConfigFactory
{
    /** @var NamingStrategyFactory */
    private $namingStrategyFactory;

    public function __construct(NamingStrategyFactory $namingStrategyFactory)
    {
        $this->namingStrategyFactory = $namingStrategyFactory;
    }

    public function create(ContextName $contextName, ContextNamespace $contextNamespace): BoundedContextConfig
    {
        $namingStrategy = $this->namingStrategyFactory->devboard($contextName, $contextNamespace);

        return new BoundedContextConfig(
            $contextName,
            $contextNamespace,
            $namingStrategy->aggregateRootId(),
            $namingStrategy->aggregateRootModel(),
            $namingStrategy->aggregateRootRepository(),
            $namingStrategy->commandHandler()
        );
    }

    public function createFromArray(string $name, array $data): BoundedContextConfig
    {
        $contextName = new ContextName($name);

        $config = new BoundedContextConfig(
            $contextName,
            new ContextNamespace($data['namespace']),
            RootIdClassName::create($data['classes']['id']),
            RootModelClassName::create($data['classes']['model']),
            RootRepositoryClassName::create($data['classes']['repository']),
            CommandHandlerClassName::create($data['classes']['handler'])
        );

        foreach ($data['classes']['entities'] as $entity) {
            $config->addEntity(EntityClassName::create($entity));
        }

        foreach ($data['classes']['commands'] as $commandName => $command) {
            $className = $command['className'];

            $parameters = [];
            foreach ($command['parameters'] as $parameterName => $parameterType) {
                $parameters[] = Property::private($parameterName, ClassName::create($parameterType));
            }

            $config->addCommand(new CommandConfig($commandName, CommandClassName::create($className), $parameters));
        }
        foreach ($data['classes']['events'] as $eventName => $event) {
            $className = $event['className'];

            $parameters = [];
            foreach ($event['parameters'] as $parameterName => $parameterType) {
                $parameters[] = Property::private($parameterName, ClassName::create($parameterType));
            }

            $config->addEvent(new EventConfig($eventName, EventClassName::create($className), $parameters));
        }

        return $config;
    }
}
