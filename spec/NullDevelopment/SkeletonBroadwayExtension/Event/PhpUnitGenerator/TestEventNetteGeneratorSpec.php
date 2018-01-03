<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventNetteGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;
use PhpSpec\ObjectBehavior;

class TestEventNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventNetteGenerator::class);
        $this->shouldHaveType(BaseTestDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
