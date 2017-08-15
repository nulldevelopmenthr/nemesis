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
use NullDev\Theater\Naming\CommandHandlerClassName;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use NullDev\Theater\NamingStrategy\TheaterNamingStrategy;
use PhpSpec\ObjectBehavior;

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
        CommandHandlerClassName $commandHandlerClassName
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
            ->willReturn($commandHandlerClassName);

        $this->create($contextName, $contextNamespace)
            ->shouldReturnAnInstanceOf(BoundedContextConfig::class);
    }

    public function it_will_create_bounded_context_configuration_from_given_array()
    {
        $name  = 'Buyer';
        $input = [
            'namespace' => 'MyCompany\Webshop\Buyers',
            'classes'   => [
                'id'         => 'MyCompany\Webshop\Buyers\Core\BuyerId',
                'model'      => 'MyCompany\Webshop\Buyers\Domain\BuyerModel',
                'repository' => 'MyCompany\Webshop\Buyers\Domain\BuyerRepository',
                'handler'    => 'MyCompany\Webshop\Buyers\Application\BuyersCommandHandler',
                'entities'   => [],
                'commands'   => [],
                'events'     => [],
            ],
        ];

        $this->createFromArray($name, $input)
            ->shouldReturnAnInstanceOf(BoundedContextConfig::class);
    }
}
