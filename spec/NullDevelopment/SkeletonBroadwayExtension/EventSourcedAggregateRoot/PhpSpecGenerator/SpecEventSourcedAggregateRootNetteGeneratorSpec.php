<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator;

use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootNetteGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;
use PhpSpec\ObjectBehavior;

class SpecEventSourcedAggregateRootNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecEventSourcedAggregateRootNetteGenerator::class);
        $this->shouldHaveType(BaseSpecDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
