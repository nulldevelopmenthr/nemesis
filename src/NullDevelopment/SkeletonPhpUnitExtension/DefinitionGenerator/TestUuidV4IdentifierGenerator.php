<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestUuidV4Identifier;

/**
 * @see TestUuidV4IdentifierGeneratorSpec
 * @see TestUuidV4IdentifierGeneratorTest
 */
class TestUuidV4IdentifierGenerator extends BaseTestDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestUuidV4Identifier) {
            return true;
        }

        return false;
    }
}
