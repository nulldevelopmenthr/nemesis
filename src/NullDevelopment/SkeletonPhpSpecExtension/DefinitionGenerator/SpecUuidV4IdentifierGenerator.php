<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecUuidV4Identifier;

/**
 * @see SpecUuidV4IdentifierGeneratorSpec
 * @see SpecUuidV4IdentifierGeneratorTest
 */
class SpecUuidV4IdentifierGenerator extends BaseSpecDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecUuidV4Identifier) {
            return true;
        }

        return false;
    }
}
