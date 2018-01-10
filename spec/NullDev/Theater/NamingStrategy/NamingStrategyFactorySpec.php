<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\NamingStrategy;

use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\NamingStrategy\DevboardNamingStrategy;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use NullDev\Theater\NamingStrategy\TheaterNamingStrategy;
use PhpSpec\ObjectBehavior;

class NamingStrategyFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(NamingStrategyFactory::class);
    }

    public function it_will_create_theater_naming_strategy_instance(
        ContextName $contextName, ContextNamespace $contextNamespace
    ) {
        $this->theater($contextName, $contextNamespace)
            ->shouldReturnAnInstanceOf(TheaterNamingStrategy::class);
    }

    public function it_will_create_devboard_naming_strategy_instance(
        ContextName $contextName, ContextNamespace $contextNamespace
    ) {
        $this->devboard($contextName, $contextNamespace)
            ->shouldReturnAnInstanceOf(DevboardNamingStrategy::class);
    }
}
