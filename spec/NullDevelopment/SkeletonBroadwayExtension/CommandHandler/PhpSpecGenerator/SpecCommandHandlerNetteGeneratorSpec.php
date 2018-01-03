<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator;

use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerNetteGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;
use PhpSpec\ObjectBehavior;

class SpecCommandHandlerNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCommandHandlerNetteGenerator::class);
        $this->shouldHaveType(BaseSpecDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
