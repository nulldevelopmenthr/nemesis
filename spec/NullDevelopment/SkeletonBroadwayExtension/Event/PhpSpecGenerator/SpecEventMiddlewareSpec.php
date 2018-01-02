<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventNetteGenerator;
use PhpSpec\ObjectBehavior;

class SpecEventMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecEventFactory $factory, SpecEventNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
