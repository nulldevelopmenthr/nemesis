<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

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
}
