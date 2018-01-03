<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRoot;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootNetteGeneratorTest
 */
class SpecEventSourcedAggregateRootNetteGenerator extends BaseSpecDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecEventSourcedAggregateRoot) {
            return true;
        }

        return false;
    }
}
