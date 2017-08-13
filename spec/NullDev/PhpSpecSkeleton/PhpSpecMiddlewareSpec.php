<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton;

use League\Tactician\Middleware;
use NullDev\PhpSpecSkeleton\PhpSpecMiddleware;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use PhpSpec\ObjectBehavior;

class PhpSpecMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecGenerator $specGenerator)
    {
        $this->beConstructedWith($specGenerator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PhpSpecMiddleware::class);
        $this->shouldImplement(Middleware::class);
    }
}
