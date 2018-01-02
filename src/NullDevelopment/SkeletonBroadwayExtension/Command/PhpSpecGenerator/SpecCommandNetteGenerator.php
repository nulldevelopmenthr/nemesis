<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommand;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandNetteGeneratorTest
 */
class SpecCommandNetteGenerator extends BaseSpecDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecCommand) {
            return true;
        }

        return false;
    }
}
