<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator\BaseClassDefinitionGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleIdentifier;

/**
 * @see TestSimpleIdentifierGeneratorSpec
 * @see TestSimpleIdentifierGeneratorTest
 */
class TestSimpleIdentifierGenerator extends BaseClassDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSimpleIdentifier) {
            return true;
        }

        return false;
    }
}
