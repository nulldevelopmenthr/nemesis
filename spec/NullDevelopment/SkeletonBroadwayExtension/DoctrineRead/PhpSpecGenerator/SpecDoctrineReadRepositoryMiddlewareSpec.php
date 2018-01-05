<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadRepositoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadRepositoryMiddleware;
use PhpSpec\ObjectBehavior;

class SpecDoctrineReadRepositoryMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecDoctrineReadRepositoryFactory $factory, SpecDoctrineReadRepositoryGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDoctrineReadRepositoryMiddleware::class);
    }
}
