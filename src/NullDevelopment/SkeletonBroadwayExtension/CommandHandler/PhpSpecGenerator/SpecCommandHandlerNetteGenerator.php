<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandler;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerNetteGeneratorTest
 */
class SpecCommandHandlerNetteGenerator extends BaseSpecDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecCommandHandler) {
            return true;
        }

        return false;
    }
}
