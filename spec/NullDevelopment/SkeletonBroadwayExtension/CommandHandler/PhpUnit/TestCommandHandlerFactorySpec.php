<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandlerFactory;
use PhpSpec\ObjectBehavior;

class TestCommandHandlerFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestCommandHandlerFactory::class);
    }
}
