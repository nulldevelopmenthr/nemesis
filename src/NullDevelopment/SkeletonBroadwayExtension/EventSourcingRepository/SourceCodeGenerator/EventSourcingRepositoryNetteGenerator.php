<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGeneratorTest
 */
class EventSourcingRepositoryNetteGenerator extends BaseSourceCodeDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof EventSourcingRepository) {
            return true;
        }

        return false;
    }

    public function handleEventSourcingRepository(EventSourcingRepository $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
