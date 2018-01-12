<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

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

    public function handle(EventSourcedAggregateRoot $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
