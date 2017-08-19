<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\BoundedContext;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\CommandConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\BoundedContext\EventConfig;
use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PhpSpec\ObjectBehavior;

class BoundedContextConfigSpec extends ObjectBehavior
{
    public function let(
        ContextName $name,
        ContextNamespace $namespace,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHandlerClassName $commandHandlerClassName
    ) {
        $this->beConstructedWith(
            $name,
            $namespace,
            $rootIdClassName,
            $modelClassName,
            $repositoryClassName,
            $commandHandlerClassName
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BoundedContextConfig::class);
    }

    public function it_will_expose_constructor_arguments(
        ContextName $name,
        ContextNamespace $namespace,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHandlerClassName $commandHandlerClassName
    ) {
        $this->getName()->shouldReturn($name);
        $this->getNamespace()->shouldReturn($namespace);
        $this->getRootIdClassName()->shouldReturn($rootIdClassName);
        $this->getModelClassName()->shouldReturn($modelClassName);
        $this->getRepositoryClassName()->shouldReturn($repositoryClassName);
        $this->getCommandHandlerClassName()->shouldReturn($commandHandlerClassName);
    }

    public function it_has_collections_empty_by_default()
    {
        $this->getEntityClassNames()->shouldReturn([]);
        $this->getCommands()->shouldReturn([]);
        $this->getEvents()->shouldReturn([]);
    }

    public function it_can_add_aggregate_entity(EntityClassName $entityClassName)
    {
        $this->addEntity($entityClassName);

        $this->getEntityClassNames()->shouldReturn([$entityClassName]);
    }

    public function it_can_add_command(CommandConfig $commandConfig)
    {
        $this->addCommand($commandConfig);

        $this->getCommands()->shouldReturn([$commandConfig]);
    }

    public function it_can_add_event(EventConfig $eventConfig)
    {
        $this->addEvent($eventConfig);

        $this->getEvents()->shouldReturn([$eventConfig]);
    }
}
