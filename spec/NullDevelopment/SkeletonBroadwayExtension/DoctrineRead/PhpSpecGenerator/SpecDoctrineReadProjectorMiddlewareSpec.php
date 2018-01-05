<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadProjectorFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadProjectorGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadProjectorMiddleware;
use PhpSpec\ObjectBehavior;

class SpecDoctrineReadProjectorMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecDoctrineReadProjectorFactory $factory, SpecDoctrineReadProjectorGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDoctrineReadProjectorMiddleware::class);
    }
}
