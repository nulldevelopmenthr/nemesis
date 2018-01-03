<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\Method;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\Method\TestCreateEventMethodGenerator;
use PhpSpec\ObjectBehavior;

class TestCreateEventMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestCreateEventMethodGenerator::class);
    }
}
