<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepositoryFactory;
use PhpSpec\ObjectBehavior;

class SpecEventSourcingRepositoryFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($factories = ['data']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventSourcingRepositoryFactory::class);
    }
}
