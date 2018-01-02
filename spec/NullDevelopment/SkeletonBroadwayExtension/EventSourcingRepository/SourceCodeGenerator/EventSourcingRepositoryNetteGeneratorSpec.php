<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator;

use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGenerator;
use PhpSpec\ObjectBehavior;

class EventSourcingRepositoryNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventSourcingRepositoryNetteGenerator::class);
        $this->shouldHaveType(BaseSourceCodeDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
