<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\BoundedContext;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHanderClassName;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use NullDev\Theater\NamingStrategy\TheaterNamingStrategy;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoundedContextConfigFactorySpec extends ObjectBehavior
{
    public function let(NamingStrategyFactory $namingStrategyFactory)
    {
        $this->beConstructedWith($namingStrategyFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BoundedContextConfigFactory::class);
    }

    public function it_will_create_bounded_context_configuration_from_given_strings(
        ContextName $contextName,
        ContextNamespace $contextNamespace,
        NamingStrategyFactory $namingStrategyFactory,
        TheaterNamingStrategy $namingStrategy,
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHanderClassName $commandHanderClassName
    ) {
        $namingStrategyFactory->theater($contextName, $contextNamespace)
            ->shouldBeCalled()
            ->willReturn($namingStrategy);

        $namingStrategy->aggregateRootId()
            ->shouldBeCalled()
            ->willReturn($rootIdClassName);

        $namingStrategy->aggregateRootModel()
            ->shouldBeCalled()
            ->willReturn($modelClassName);

        $namingStrategy->aggregateRootRepository()
            ->shouldBeCalled()
            ->willReturn($repositoryClassName);

        $namingStrategy->commandHandler()
            ->shouldBeCalled()
            ->willReturn($commandHanderClassName);

        $this->create($contextName, $contextNamespace)
            ->shouldReturnAnInstanceOf(BoundedContextConfig::class);
    }
            ->shouldReturnAnInstanceOf(BoundedContextConfig::class);
    }
}
