<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepositoryFactory;
use PhpSpec\ObjectBehavior;

class TestEventSourcingRepositoryFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventSourcingRepositoryFactory::class);
    }
}
