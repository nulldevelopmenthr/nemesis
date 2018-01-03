<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRoot;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootNetteGeneratorTest
 */
class TestEventSourcedAggregateRootNetteGenerator extends BaseTestDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestEventSourcedAggregateRoot) {
            return true;
        }

        return false;
    }
}
