<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadProjectorFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadProjectorGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadProjectorMiddleware;
use PhpSpec\ObjectBehavior;

class TestDoctrineReadProjectorMiddlewareSpec extends ObjectBehavior
{
    public function let(TestDoctrineReadProjectorFactory $factory, TestDoctrineReadProjectorGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDoctrineReadProjectorMiddleware::class);
    }
}
