<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleEntityNetteGenerator;
use PhpSpec\ObjectBehavior;

class SimpleEntityNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleEntityNetteGenerator::class);
    }
}
