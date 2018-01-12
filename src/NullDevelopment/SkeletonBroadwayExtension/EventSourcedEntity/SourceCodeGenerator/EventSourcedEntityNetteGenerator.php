<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator\EventSourcedEntityNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator\EventSourcedEntityNetteGeneratorTest
 */
class EventSourcedEntityNetteGenerator extends BaseSourceCodeDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof EventSourcedEntity) {
            return true;
        }

        return false;
    }

    public function handle(EventSourcedEntity $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
