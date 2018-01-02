<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandler;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerNetteGeneratorTest
 */
class TestCommandHandlerNetteGenerator extends BaseTestDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestCommandHandler) {
            return true;
        }

        return false;
    }
}
