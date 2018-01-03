<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleEntity;

/**
 * @see SimpleEntityGeneratorSpec
 * @see SimpleEntityGeneratorTest
 */
class SimpleEntityGenerator extends BaseSourceCodeDefinitionGenerator
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
