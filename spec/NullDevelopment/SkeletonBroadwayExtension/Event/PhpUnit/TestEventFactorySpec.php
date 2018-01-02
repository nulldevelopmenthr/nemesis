<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEventFactory;
use PhpSpec\ObjectBehavior;

class TestEventFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventFactory::class);
    }
}
