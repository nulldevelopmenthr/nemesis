<?php

declare(strict_types=1);

namespace NullDev\Theater\NamingStrategy;

use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;

/**
 * @see NamingStrategyFactorySpec
 * @see NamingStrategyFactoryTest
 */
class NamingStrategyFactory
{
    public function theater(ContextName $contextName, ContextNamespace $contextNamespace): TheaterNamingStrategy
    {
        return new TheaterNamingStrategy($contextName, $contextNamespace);
    }

    public function devboard(ContextName $contextName, ContextNamespace $contextNamespace): DevboardNamingStrategy
    {
        return new DevboardNamingStrategy($contextName, $contextNamespace);
    }
}
