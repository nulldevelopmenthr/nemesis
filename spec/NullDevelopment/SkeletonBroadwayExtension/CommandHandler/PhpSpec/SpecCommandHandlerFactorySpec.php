<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactory;
use PhpSpec\ObjectBehavior;

class SpecCommandHandlerFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCommandHandlerFactory::class);
    }
}
