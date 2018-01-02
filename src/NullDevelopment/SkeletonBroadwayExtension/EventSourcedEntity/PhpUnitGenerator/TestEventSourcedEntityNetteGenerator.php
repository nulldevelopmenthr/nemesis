<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntity;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityNetteGeneratorTest
 */
class TestEventSourcedEntityNetteGenerator extends BaseTestDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestEventSourcedEntity) {
            return true;
        }

        return false;
    }
}
