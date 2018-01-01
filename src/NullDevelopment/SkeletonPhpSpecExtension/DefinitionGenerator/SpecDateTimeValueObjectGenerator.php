<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecDateTimeValueObject;

/**
 * @see SpecDateTimeValueObjectGeneratorSpec
 * @see SpecDateTimeValueObjectGeneratorTest
 */
class SpecDateTimeValueObjectGenerator extends BaseSpecDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecDateTimeValueObject) {
            return true;
        }

        return false;
    }
}
