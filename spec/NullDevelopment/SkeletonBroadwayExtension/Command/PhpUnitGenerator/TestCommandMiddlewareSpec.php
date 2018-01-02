<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandNetteGenerator;
use PhpSpec\ObjectBehavior;

class TestCommandMiddlewareSpec extends ObjectBehavior
{
    public function let(TestCommandFactory $factory, TestCommandNetteGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestCommandMiddleware::class);
    }
}
