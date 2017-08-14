<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Config;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\Config\TheaterConfig;
use PhpSpec\ObjectBehavior;

class TheaterConfigSpec extends ObjectBehavior
{
    public function let(BoundedContextConfig $boundedContextConfig, ContextName $name)
    {
        $boundedContextConfig->getName()->willReturn($name);

        $this->beConstructedWith($contexts = [$boundedContextConfig]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TheaterConfig::class);
    }

    public function it_throws_an_exception_if_contexts_are_not_instances_of_expected_class(\DateTime $wrongObject)
    {
        $contexts = [$wrongObject];

        $this->shouldThrow(new \Exception('Contexts should be instances of BoundedContextConfig'))
            ->during('__construct', [$contexts]);
    }

    public function it_exposes_all_contexts(BoundedContextConfig $boundedContextConfig)
    {
        $this->getContexts()->shouldReturn([$boundedContextConfig]);
    }

    public function it_knows_if_a_context_exists(ContextName $name)
    {
        $this->hasContextByName($name)->shouldReturn(true);
    }

    public function it_knows_if_a_context_doesnt_exist(ContextName $nonExistantContextName)
    {
        $this->hasContextByName($nonExistantContextName)->shouldReturn(false);
    }

    public function it_can_return_context_by_given_name(BoundedContextConfig $boundedContextConfig, ContextName $name)
    {
        $this->getContextByName($name)->shouldReturn($boundedContextConfig);
    }

    public function it_returns_null_if_asked_for_context_doesnt_exist(ContextName $nonExistantContextName)
    {
        $this->getContextByName($nonExistantContextName)->shouldReturn(null);
    }
}
