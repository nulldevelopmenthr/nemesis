<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator\BaseClassDefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SimpleEntityGeneratorSpec
 * @see SimpleEntityGeneratorTest
 */
class SimpleEntityGenerator extends BaseClassDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SimpleEntity) {
            return true;
        }

        return false;
    }

    public function handleSimpleEntity(SimpleEntity $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
