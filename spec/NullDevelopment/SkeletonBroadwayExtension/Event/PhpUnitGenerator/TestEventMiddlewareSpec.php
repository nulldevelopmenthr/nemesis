<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventNetteGenerator;
use PhpSpec\ObjectBehavior;

class TestEventMiddlewareSpec extends ObjectBehavior
{
    public function let(TestEventFactory $factory, TestEventNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventMiddleware::class);
    }
}
