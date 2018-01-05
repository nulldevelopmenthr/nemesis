<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadRepositoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadRepositoryMiddleware;
use PhpSpec\ObjectBehavior;

class TestDoctrineReadRepositoryMiddlewareSpec extends ObjectBehavior
{
    public function let(TestDoctrineReadRepositoryFactory $factory, TestDoctrineReadRepositoryGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDoctrineReadRepositoryMiddleware::class);
    }
}
