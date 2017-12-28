<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleEntity;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;

/**
 * @see SpecSimpleEntityGeneratorSpec
 * @see SpecSimpleEntityGeneratorTest
 */
class SpecSimpleEntityGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecSimpleEntity) {
            return true;
        }

        return false;
    }
}
