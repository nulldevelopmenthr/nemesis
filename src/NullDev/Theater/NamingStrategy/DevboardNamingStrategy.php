<?php

declare(strict_types=1);

namespace NullDev\Theater\NamingStrategy;

use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use NullDev\Theater\Naming\EventClassName;

/**
 * @see DevboardNamingStrategySpec
 * @see DevboardNamingStrategyTest
 */
class DevboardNamingStrategy implements NamingStrategy
{
    /** @var ContextName */
    private $contextName;
    /** @var ContextNamespace */
    private $contextNamespace;

    public function __construct(ContextName $contextName, ContextNamespace $contextNamespace)
    {
        $this->contextName      = $contextName;
        $this->contextNamespace = $contextNamespace;
    }

    public function aggregateRootId(): RootIdClassName
    {
        $namespace = $this->getCoreNamespace();
        $className = $this->getName().'Id';

        return new RootIdClassName($className, $namespace);
    }

    public function aggregateRootModel(): RootModelClassName
    {
        $namespace = $this->getDomainNamespace();
        $className = $this->getName().'Model';

        return new RootModelClassName($className, $namespace);
    }

    public function aggregateRootRepository(): RootRepositoryClassName
    {
        $namespace = $this->getApplicationNamespace();
        $className = $this->getName().'Repository';

        return new RootRepositoryClassName($className, $namespace);
    }

    public function aggregateEntity(string $entityName): EntityClassName
    {
        $namespace = $this->getDomainNamespace();
        $className = $entityName.'Entity';

        return new EntityClassName($className, $namespace);
    }

    public function commandHandler(): CommandHandlerClassName
    {
        $namespace = $this->getApplicationNamespace();
        $className = $this->getName().'CommandHandler';

        return new CommandHandlerClassName($className, $namespace);
    }

    public function command(string $commandName): CommandClassName
    {
        $namespace = $this->getCoreNamespace().'\Command';

        return new CommandClassName($commandName, $namespace);
    }

    public function event(string $eventName): EventClassName
    {
        $namespace = $this->getCoreNamespace().'\Event';

        return new EventClassName($eventName, $namespace);
    }

    private function getCoreNamespace(): string
    {
        return $this->getNamespace().'\Core';
    }

    private function getDomainNamespace(): string
    {
        return $this->getNamespace().'\Domain';
    }

    private function getApplicationNamespace(): string
    {
        return $this->getNamespace().'\Application';
    }

    private function getName(): string
    {
        return $this->contextName->getValue();
    }

    private function getNamespace(): string
    {
        return $this->contextNamespace->getValue();
    }
}
