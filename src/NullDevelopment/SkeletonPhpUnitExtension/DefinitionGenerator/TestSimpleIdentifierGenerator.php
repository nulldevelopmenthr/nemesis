<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleIdentifier;

/**
 * @see TestSimpleIdentifierGeneratorSpec
 * @see TestSimpleIdentifierGeneratorTest
 */
class TestSimpleIdentifierGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSimpleIdentifier) {
            return true;
        }

        return false;
    }
}
