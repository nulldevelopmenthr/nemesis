<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator;

use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\EventNetteGenerator;
use PhpSpec\ObjectBehavior;

class EventNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventNetteGenerator::class);
        $this->shouldHaveType(BaseSourceCodeDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
