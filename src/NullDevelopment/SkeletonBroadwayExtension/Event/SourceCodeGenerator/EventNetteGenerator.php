<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\EventNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\EventNetteGeneratorTest
 */
class EventNetteGenerator extends BaseSourceCodeDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof Event) {
            return true;
        }

        return false;
    }

    public function handleEvent(Event $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
