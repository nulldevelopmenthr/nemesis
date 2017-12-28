<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;

/**
 * @see TestSimpleIdentifierGeneratorSpec
 * @see TestSimpleIdentifierGeneratorTest
 */
class TestSimpleIdentifierGenerator extends BaseDefinitionGenerator
{
    public function supports(ClassType $definition): bool
    {
        if ($definition instanceof TestSimpleIdentifier) {
            return true;
        }

        return false;
    }
}
