<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\Method;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\Method\SpecCreateEventMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecCreateEventMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCreateEventMethodGenerator::class);
    }
}
