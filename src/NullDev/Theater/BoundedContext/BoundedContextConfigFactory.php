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

/**
 * @see BoundedContextConfigFactorySpec
 * @see BoundedContextConfigFactoryTest
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
        $namingStrategy = $this->namingStrategyFactory->theater($contextName, $contextNamespace);

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

        foreach ($data['classes']['commands'] as $command) {
            $config->addCommand(CommandClassName::create($command));
        }
        foreach ($data['classes']['events'] as $event) {
            $config->addEvent(EventClassName::create($event));
        }

        return $config;
    }
}
