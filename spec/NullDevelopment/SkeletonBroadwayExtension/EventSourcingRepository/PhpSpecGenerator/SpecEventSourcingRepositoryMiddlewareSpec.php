<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryNetteGenerator;
use PhpSpec\ObjectBehavior;

class SpecEventSourcingRepositoryMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecEventSourcingRepositoryFactory $factory, SpecEventSourcingRepositoryNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventSourcingRepositoryMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
