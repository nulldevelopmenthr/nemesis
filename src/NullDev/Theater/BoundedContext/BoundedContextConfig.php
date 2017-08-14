<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandClassName;
use NullDev\Theater\Naming\CommandHanderClassName;
use NullDev\Theater\Naming\EventClassName;

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
    /** @var CommandHanderClassName */
    private $commandHanderClassName;

    /** @var EntityClassName[]|array */
    private $entityClassNames = [];
    /** @var CommandClassName[]|array */
    private $commandClassNames = [];
    /** @var EventClassName[]|array */
    private $eventClassNames = [];

    public function __construct(
        ContextName $name,
        ContextNamespace $namespace,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHanderClassName $commandHanderClassName
    ) {
        $this->name                   = $name;
        $this->namespace              = $namespace;
        $this->rootIdClassName        = $rootIdClassName;
        $this->modelClassName         = $modelClassName;
        $this->repositoryClassName    = $repositoryClassName;
        $this->commandHanderClassName = $commandHanderClassName;
    }

    public function addEntity(EntityClassName $entityClassName)
    {
        $this->entityClassNames[] = $entityClassName;
    }

    public function addCommand(CommandClassName $commandClassName)
    {
        $this->commandClassNames[] = $commandClassName;
    }

    public function addEvent(EventClassName $eventClassName)
    {
        $this->eventClassNames[] = $eventClassName;
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

    public function getCommandHanderClassName(): CommandHanderClassName
    {
        return $this->commandHanderClassName;
    }

    public function getEntityClassNames(): array
    {
        return $this->entityClassNames;
    }

    public function getCommandClassNames(): array
    {
        return $this->commandClassNames;
    }

    public function getEventClassNames(): array
    {
        return $this->eventClassNames;
    }
}
