<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\NamingStrategy;

use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use NullDev\Theater\Naming\EventClassName;
use NullDev\Theater\NamingStrategy\DevboardNamingStrategy;
use NullDev\Theater\NamingStrategy\NamingStrategy;
use PhpSpec\ObjectBehavior;

class DevboardNamingStrategySpec extends ObjectBehavior
{
    public function let(ContextName $name, ContextNamespace $namespace)
    {
        $name->getValue()->willReturn('Webshop');
        $namespace->getValue()->willReturn('MyCompany\Webshop\\');
        $this->beConstructedWith($name, $namespace);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DevboardNamingStrategy::class);
        $this->shouldImplement(NamingStrategy::class);
    }

    public function it_should_name_aggregate_root_id_from_given_context_name_and_namespace()
    {
        $this->aggregateRootId()
            ->shouldReturnAnInstanceOf(RootIdClassName::class);
    }

    public function it_should_name_aggregate_root_model_from_given_context_name_and_namespace()
    {
        $this->aggregateRootModel()
            ->shouldReturnAnInstanceOf(RootModelClassName::class);
    }

    public function it_should_name_aggregate_root_repository_from_given_context_name_and_namespace()
    {
        $this->aggregateRootRepository()
            ->shouldReturnAnInstanceOf(RootRepositoryClassName::class);
    }

    public function it_should_name_aggregate_entity()
    {
        $this->aggregateEntity('Something')
            ->shouldReturnAnInstanceOf(EntityClassName::class);
    }

    public function it_should_name_command_handler_from_given_context_name_and_namespace()
    {
        $this->commandHandler()
            ->shouldReturnAnInstanceOf(CommandHandlerClassName::class);
    }

    public function it_should_name_command()
    {
        $this->command('DoSomething')
            ->shouldReturnAnInstanceOf(CommandClassName::class);
    }

    public function it_should_name_event()
    {
        $this->event('DidSomething')
            ->shouldReturnAnInstanceOf(EventClassName::class);
    }
}
