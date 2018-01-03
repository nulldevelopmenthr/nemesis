<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootNetteGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;
use PhpSpec\ObjectBehavior;

class TestEventSourcedAggregateRootNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventSourcedAggregateRootNetteGenerator::class);
        $this->shouldHaveType(BaseTestDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
