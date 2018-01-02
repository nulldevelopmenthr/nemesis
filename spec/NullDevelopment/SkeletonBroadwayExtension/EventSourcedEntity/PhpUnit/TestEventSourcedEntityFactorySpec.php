<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntityFactory;
use PhpSpec\ObjectBehavior;

class TestEventSourcedEntityFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventSourcedEntityFactory::class);
    }
}
