<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryNetteGenerator;
use PhpSpec\ObjectBehavior;

class TestEventSourcingRepositoryMiddlewareSpec extends ObjectBehavior
{
    public function let(TestEventSourcingRepositoryFactory $factory, TestEventSourcingRepositoryNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventSourcingRepositoryMiddleware::class);
    }
}
