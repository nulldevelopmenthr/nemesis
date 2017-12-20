<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleCollectionNetteGenerator;
use PhpSpec\ObjectBehavior;

class SimpleCollectionNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollectionNetteGenerator::class);
    }
}
