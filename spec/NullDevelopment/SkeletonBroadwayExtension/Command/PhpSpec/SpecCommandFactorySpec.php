<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommandFactory;
use PhpSpec\ObjectBehavior;

class SpecCommandFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCommandFactory::class);
    }
}
