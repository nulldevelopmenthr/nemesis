<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

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

    public function handle(Event $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
