<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Command\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Command\SourceCodeGenerator\CommandNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Command\SourceCodeGenerator\CommandNetteGeneratorTest
 */
class CommandNetteGenerator extends BaseSourceCodeDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof Command) {
            return true;
        }

        return false;
    }

    public function handleCommand(Command $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
