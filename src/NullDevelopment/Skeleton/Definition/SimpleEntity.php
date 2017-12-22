<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Definition;

use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\SourceCode;

/**
 * @see SimpleEntitySpec
 * @see SimpleEntityTest
 * @see SimpleEntityLoader
 * @see SimpleEntityNetteGenerator
 */
class SimpleEntity extends ClassType implements SourceCode
{
    public function getGenerationPriority(): int
    {
        return 50;
    }
}
