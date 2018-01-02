<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerNetteGenerator;
use PhpSpec\ObjectBehavior;

class TestCommandHandlerMiddlewareSpec extends ObjectBehavior
{
    public function let(TestCommandHandlerFactory $factory, TestCommandHandlerNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestCommandHandlerMiddleware::class);
    }
}
