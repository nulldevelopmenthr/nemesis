<?php

declare(strict_types=1);

namespace NullDev\Theater\NamingStrategy;

use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use NullDev\Theater\Naming\EventClassName;

interface NamingStrategy
{
    public function aggregateRootId(): RootIdClassName;

    public function aggregateRootModel(): RootModelClassName;

    public function aggregateRootRepository(): RootRepositoryClassName;

    public function aggregateEntity(string $entityName): EntityClassName;

    public function commandHandler(): CommandHandlerClassName;

    public function command(string $commandName): CommandClassName;

    public function event(string $eventName): EventClassName;
}
