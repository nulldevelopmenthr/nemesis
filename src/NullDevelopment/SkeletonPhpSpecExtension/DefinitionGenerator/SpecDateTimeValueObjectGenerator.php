<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecDateTimeValueObject;

/**
 * @see SpecDateTimeValueObjectGeneratorSpec
 * @see SpecDateTimeValueObjectGeneratorTest
 */
class SpecDateTimeValueObjectGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecDateTimeValueObject) {
            return true;
        }

        return false;
    }
}
