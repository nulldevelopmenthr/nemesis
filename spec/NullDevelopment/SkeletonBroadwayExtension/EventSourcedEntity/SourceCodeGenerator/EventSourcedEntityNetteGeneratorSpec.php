<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator;

use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator\EventSourcedEntityNetteGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use PhpSpec\ObjectBehavior;

class EventSourcedEntityNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventSourcedEntityNetteGenerator::class);
        $this->shouldHaveType(BaseSourceCodeDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
