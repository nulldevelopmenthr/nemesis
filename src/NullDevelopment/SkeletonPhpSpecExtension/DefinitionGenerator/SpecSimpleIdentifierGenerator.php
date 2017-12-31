<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSimpleIdentifier;

/**
 * @see SpecSimpleIdentifierGeneratorSpec
 * @see SpecSimpleIdentifierGeneratorTest
 */
class SpecSimpleIdentifierGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecSimpleIdentifier) {
            return true;
        }

        return false;
    }
}
