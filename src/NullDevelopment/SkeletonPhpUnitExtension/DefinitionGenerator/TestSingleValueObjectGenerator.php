<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSingleValueObject;

/**
 * @see TestSingleValueObjectGeneratorSpec
 * @see TestSingleValueObjectGeneratorTest
 */
class TestSingleValueObjectGenerator extends BaseTestDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSingleValueObject) {
            return true;
        }

        return false;
    }
}
