<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSimpleEntity;

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
