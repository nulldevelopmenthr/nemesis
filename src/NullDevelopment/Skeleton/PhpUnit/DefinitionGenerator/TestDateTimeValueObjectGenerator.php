<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestDateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;

/**
 * @see TestDateTimeValueObjectGeneratorSpec
 * @see TestDateTimeValueObjectGeneratorTest
 */
class TestDateTimeValueObjectGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestDateTimeValueObject) {
            return true;
        }

        return false;
    }
}
