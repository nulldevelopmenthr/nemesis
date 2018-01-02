<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator;

use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\CommandHandlerNetteGenerator;
use PhpSpec\ObjectBehavior;

class CommandHandlerNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandHandlerNetteGenerator::class);
        $this->shouldHaveType(BaseSourceCodeDefinitionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
