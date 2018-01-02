<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEvent;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventNetteGeneratorTest
 */
class TestEventNetteGenerator extends BaseTestDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestEvent) {
            return true;
        }

        return false;
    }
}
