<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator;

use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
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
