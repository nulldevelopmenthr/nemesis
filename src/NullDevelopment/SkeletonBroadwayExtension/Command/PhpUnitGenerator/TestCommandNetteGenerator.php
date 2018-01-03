<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommand;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandNetteGeneratorTest
 */
class TestCommandNetteGenerator extends BaseTestDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestCommand) {
            return true;
        }

        return false;
    }
}
