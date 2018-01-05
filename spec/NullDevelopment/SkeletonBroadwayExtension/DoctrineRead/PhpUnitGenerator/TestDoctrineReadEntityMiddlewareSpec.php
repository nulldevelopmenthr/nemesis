<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadEntityGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadEntityMiddleware;
use PhpSpec\ObjectBehavior;

class TestDoctrineReadEntityMiddlewareSpec extends ObjectBehavior
{
    public function let(TestDoctrineReadEntityFactory $factory, TestDoctrineReadEntityGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDoctrineReadEntityMiddleware::class);
    }
}
