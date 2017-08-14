<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

/**
 * @see BoundedContextConfigFactorySpec
 * @see BoundedContextConfigFactoryTest
 */
class BoundedContextConfigFactory
{
    /**
     * @var \NullDev\Theater\NamingStrategy\NamingStrategyFactory
     */
    private $namingStrategyFactory;

    public function __construct(\NullDev\Theater\NamingStrategy\NamingStrategyFactory $namingStrategyFactory)
    {
        $this->namingStrategyFactory = $namingStrategyFactory;
    }

    public function create(string $name, string $namespace): BoundedContextConfig
    {
        $contextName      = new ContextName($name);
        $contextNamespace = new ContextNamespace($namespace);

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
}
