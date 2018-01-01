<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator\BaseClassDefinitionGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestDateTimeValueObject;

/**
 * @see TestDateTimeValueObjectGeneratorSpec
 * @see TestDateTimeValueObjectGeneratorTest
 */
class TestDateTimeValueObjectGenerator extends BaseClassDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestDateTimeValueObject) {
            return true;
        }

        return false;
    }
}
