<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSingleValueObject;

/**
 * @see SpecSingleValueObjectGeneratorSpec
 * @see SpecSingleValueObjectGeneratorTest
 */
class SpecSingleValueObjectGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecSingleValueObject) {
            return true;
        }

        return false;
    }
}