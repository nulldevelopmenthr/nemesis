<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadFactoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadFactoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadFactoryMiddleware;
use PhpSpec\ObjectBehavior;

class SpecDoctrineReadFactoryMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecDoctrineReadFactoryFactory $factory, SpecDoctrineReadFactoryGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDoctrineReadFactoryMiddleware::class);
    }
}
