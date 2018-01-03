<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator;

use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventNetteGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;
use PhpSpec\ObjectBehavior;

class SpecEventNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventNetteGenerator::class);
        $this->shouldHaveType(BaseSpecDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
