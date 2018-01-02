<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactory;
use PhpSpec\ObjectBehavior;

class TestCommandFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestCommandFactory::class);
    }
}
