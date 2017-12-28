<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleEntity;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;

/**
 * @see TestSimpleEntityGeneratorSpec
 * @see TestSimpleEntityGeneratorTest
 */
class TestSimpleEntityGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSimpleEntity) {
            return true;
        }

        return false;
    }
}
