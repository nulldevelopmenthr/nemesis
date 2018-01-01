<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator\BaseClassDefinitionGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSingleValueObject;

/**
 * @see TestSingleValueObjectGeneratorSpec
 * @see TestSingleValueObjectGeneratorTest
 */
class TestSingleValueObjectGenerator extends BaseClassDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSingleValueObject) {
            return true;
        }

        return false;
    }
}
