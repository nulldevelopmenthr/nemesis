<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;

/**
 * @see BoundedContextConfigSpec
 * @see BoundedContextConfigTest
 */
class BoundedContextConfig
{
    /** @var ContextName */
    private $name;
    /** @var ContextNamespace */
    private $namespace;
    /** @var RootIdClassName */
    private $rootIdClassName;
    /** @var RootModelClassName */
    private $modelClassName;
    /** @var RootRepositoryClassName */
    private $repositoryClassName;
    /** @var CommandHandlerClassName */
    private $commandHandlerClassName;

    /** @var EntityClassName[]|array */
    private $entityClassNames = [];
    /** @var CommandConfig[]|array */
    private $commands = [];
    /** @var EventConfig[]|array */
    private $events = [];

    public function __construct(
        ContextName $name,
        ContextNamespace $namespace,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHandlerClassName $commandHandlerClassName
    ) {
        $this->name                    = $name;
        $this->namespace               = $namespace;
        $this->rootIdClassName         = $rootIdClassName;
        $this->modelClassName          = $modelClassName;
        $this->repositoryClassName     = $repositoryClassName;
        $this->commandHandlerClassName = $commandHandlerClassName;
    }

    public function addEntity(EntityClassName $entityClassName)
    {
        $this->entityClassNames[] = $entityClassName;
    }

    public function addCommand(CommandConfig $commandConfig)
    {
        $this->commands[] = $commandConfig;
    }

    public function addEvent(EventConfig $eventConfig)
    {
        $this->events[] = $eventConfig;
    }

    public function getName(): ContextName
    {
        return $this->name;
    }

    public function getNamespace(): ContextNamespace
    {
        return $this->namespace;
    }

    public function getRootIdClassName(): RootIdClassName
    {
        return $this->rootIdClassName;
    }

    public function getModelClassName(): RootModelClassName
    {
        return $this->modelClassName;
    }

    public function getRepositoryClassName(): RootRepositoryClassName
    {
        return $this->repositoryClassName;
    }

    public function getCommandHandlerClassName(): CommandHandlerClassName
    {
        return $this->commandHandlerClassName;
    }

    public function getEntityClassNames(): array
    {
        return $this->entityClassNames;
    }

    /** @return CommandConfig[] */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /** @return EventConfig[] */
    public function getEvents(): array
    {
        return $this->events;
    }

    public function toArray(): array
    {
        $commands = [];
        $events   = [];

        foreach ($this->commands as $commandConfig) {
            $parameters = [];

            foreach ($commandConfig->getParameters() as $parameter) {
                $parameters[$parameter->getName()] = $parameter->getTypeFullName();
            }

            $commands[$commandConfig->getName()] = [
                'className'  => $commandConfig->getCommandClassName()->getFullName(),
                'parameters' => $parameters,
            ];
        }

        foreach ($this->events as $eventConfig) {
            $parameters = [];

            foreach ($eventConfig->getParameters() as $parameter) {
                $parameters[$parameter->getName()] = $parameter->getTypeFullName();
            }

            $events[$eventConfig->getName()] = [
                'className'  => $eventConfig->getEventClassName()->getFullName(),
                'parameters' => $parameters,
            ];
        }

        return [
            'namespace' => $this->namespace->getValue(),
            'classes'   => [
                'id'         => $this->rootIdClassName->getFullName(),
                'model'      => $this->modelClassName->getFullName(),
                'repository' => $this->repositoryClassName->getFullName(),
                'handler'    => $this->commandHandlerClassName->getFullName(),
                'entities'   => [],
                'commands'   => $commands,
                'events'     => $events,
            ],
        ];
    }
}
