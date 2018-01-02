<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandNetteGenerator;
use PhpSpec\ObjectBehavior;

class SpecCommandMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecCommandFactory $factory, SpecCommandNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCommandMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
