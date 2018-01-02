<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityNetteGenerator;
use PhpSpec\ObjectBehavior;

class SpecEventSourcedEntityMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecEventSourcedEntityFactory $factory, SpecEventSourcedEntityNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventSourcedEntityMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
