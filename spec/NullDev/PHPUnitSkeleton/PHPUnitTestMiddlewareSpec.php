<?php

declare(strict_types=1);

namespace spec\NullDev\PHPUnitSkeleton;

use League\Tactician\Middleware;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestMiddleware;
use PhpSpec\ObjectBehavior;

class PHPUnitTestMiddlewareSpec extends ObjectBehavior
{
    public function let(PHPUnitTestGenerator $testGenerator)
    {
        $this->beConstructedWith($testGenerator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PHPUnitTestMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
