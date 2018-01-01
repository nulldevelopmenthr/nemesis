<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSimpleIdentifier;

/**
 * @see SpecSimpleIdentifierGeneratorSpec
 * @see SpecSimpleIdentifierGeneratorTest
 */
class SpecSimpleIdentifierGenerator extends BaseSpecDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecSimpleIdentifier) {
            return true;
        }

        return false;
    }
}
