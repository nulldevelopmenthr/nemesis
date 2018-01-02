<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEventFactory;
use PhpSpec\ObjectBehavior;

class SpecEventFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventFactory::class);
    }
}
