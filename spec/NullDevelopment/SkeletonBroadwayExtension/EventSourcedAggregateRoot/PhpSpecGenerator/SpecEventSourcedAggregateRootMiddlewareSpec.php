<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootNetteGenerator;
use PhpSpec\ObjectBehavior;

class SpecEventSourcedAggregateRootMiddlewareSpec extends ObjectBehavior
{
    public function let(
        SpecEventSourcedAggregateRootFactory $factory, SpecEventSourcedAggregateRootNetteGenerator $generator
    ) {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventSourcedAggregateRootMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
