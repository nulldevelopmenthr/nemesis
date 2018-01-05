<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadEntityGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadEntityMiddleware;
use PhpSpec\ObjectBehavior;

class SpecDoctrineReadEntityMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecDoctrineReadEntityFactory $factory, SpecDoctrineReadEntityGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDoctrineReadEntityMiddleware::class);
    }
}
