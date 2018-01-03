<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Result;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCodeGenerator\EventSourcedAggregateRootNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCodeGenerator\EventSourcedAggregateRootNetteGeneratorTest
 */
class EventSourcedAggregateRootNetteGenerator extends BaseSourceCodeDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof EventSourcedAggregateRoot) {
            return true;
        }

        return false;
    }

    public function handleEventSourcedAggregateRoot(EventSourcedAggregateRoot $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
