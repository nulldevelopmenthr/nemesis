<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator;

use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityNetteGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;
use PhpSpec\ObjectBehavior;

class SpecEventSourcedEntityNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventSourcedEntityNetteGenerator::class);
        $this->shouldHaveType(BaseSpecDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
