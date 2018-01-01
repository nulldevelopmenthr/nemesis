<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleEntity;

/**
 * @see TestSimpleEntityGeneratorSpec
 * @see TestSimpleEntityGeneratorTest
 */
class TestSimpleEntityGenerator extends BaseTestDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSimpleEntity) {
            return true;
        }

        return false;
    }
}
