<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadFactoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadFactoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadFactoryMiddleware;
use PhpSpec\ObjectBehavior;

class TestDoctrineReadFactoryMiddlewareSpec extends ObjectBehavior
{
    public function let(TestDoctrineReadFactoryFactory $factory, TestDoctrineReadFactoryGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDoctrineReadFactoryMiddleware::class);
    }
}
