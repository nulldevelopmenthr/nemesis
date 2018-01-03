<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityNetteGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;
use PhpSpec\ObjectBehavior;

class TestEventSourcedEntityNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventSourcedEntityNetteGenerator::class);
        $this->shouldHaveType(BaseTestDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
