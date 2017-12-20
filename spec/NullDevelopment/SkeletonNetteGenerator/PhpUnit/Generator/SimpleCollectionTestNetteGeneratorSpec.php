<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator\SimpleCollectionTestNetteGenerator;
use PhpSpec\ObjectBehavior;

class SimpleCollectionTestNetteGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollectionTestNetteGenerator::class);
    }
}
