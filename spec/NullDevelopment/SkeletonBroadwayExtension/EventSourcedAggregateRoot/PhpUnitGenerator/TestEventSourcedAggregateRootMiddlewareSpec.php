<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootNetteGenerator;
use PhpSpec\ObjectBehavior;

class TestEventSourcedAggregateRootMiddlewareSpec extends ObjectBehavior
{
    public function let(
        TestEventSourcedAggregateRootFactory $factory, TestEventSourcedAggregateRootNetteGenerator $generator
    ) {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventSourcedAggregateRootMiddleware::class);
    }
}
