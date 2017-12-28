<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;

/**
 * @see SpecSingleValueObjectGeneratorSpec
 * @see SpecSingleValueObjectGeneratorTest
 */
class SpecSingleValueObjectGenerator extends BaseDefinitionGenerator
{
    public function supports(ClassType $definition): bool
    {
        if ($definition instanceof SpecSingleValueObject) {
            return true;
        }

        return false;
    }
}
