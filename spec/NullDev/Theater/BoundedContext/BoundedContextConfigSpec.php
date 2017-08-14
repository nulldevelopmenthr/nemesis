<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\BoundedContext;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandClassName;
use NullDev\Theater\Naming\CommandHanderClassName;
use NullDev\Theater\Naming\EventClassName;
use PhpSpec\ObjectBehavior;

class BoundedContextConfigSpec extends ObjectBehavior
{
    public function let(
        ContextName $name,
        ContextNamespace $namespace,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHanderClassName $commandHanderClassName
    ) {
        $this->beConstructedWith(
            $name,
            $namespace,
            $rootIdClassName,
            $modelClassName,
            $repositoryClassName,
            $commandHanderClassName
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
        CommandHanderClassName $commandHanderClassName
    ) {
        $this->getName()->shouldReturn($name);
        $this->getNamespace()->shouldReturn($namespace);
        $this->getRootIdClassName()->shouldReturn($rootIdClassName);
        $this->getModelClassName()->shouldReturn($modelClassName);
        $this->getRepositoryClassName()->shouldReturn($repositoryClassName);
        $this->getCommandHanderClassName()->shouldReturn($commandHanderClassName);
    }

    public function it_has_collections_empty_by_default()
    {
        $this->getEntityClassNames()->shouldReturn([]);
        $this->getCommandClassNames()->shouldReturn([]);
        $this->getEventClassNames()->shouldReturn([]);
    }

    public function it_can_add_aggregate_entity(EntityClassName $entityClassName)
    {
        $this->addEntity($entityClassName);

        $this->getEntityClassNames()->shouldReturn([$entityClassName]);
    }

    public function it_can_add_command(CommandClassName $commandClassName)
    {
        $this->addCommand($commandClassName);

        $this->getCommandClassNames()->shouldReturn([$commandClassName]);
    }

    public function it_can_add_event(EventClassName $eventClassName)
    {
        $this->addEvent($eventClassName);

        $this->getEventClassNames()->shouldReturn([$eventClassName]);
    }
}
