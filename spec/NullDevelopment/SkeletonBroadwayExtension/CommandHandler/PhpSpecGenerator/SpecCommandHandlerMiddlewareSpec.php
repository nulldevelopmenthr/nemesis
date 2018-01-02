<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerNetteGenerator;
use PhpSpec\ObjectBehavior;

class SpecCommandHandlerMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecCommandHandlerFactory $factory, SpecCommandHandlerNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCommandHandlerMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
