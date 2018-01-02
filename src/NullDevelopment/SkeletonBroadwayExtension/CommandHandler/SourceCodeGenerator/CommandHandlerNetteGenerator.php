<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\CommandHandlerNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\CommandHandlerNetteGeneratorTest
 */
class CommandHandlerNetteGenerator extends BaseSourceCodeDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof CommandHandler) {
            return true;
        }

        return false;
    }

    public function handleCommandHandler(CommandHandler $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
