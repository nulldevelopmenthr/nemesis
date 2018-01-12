<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;

/**
 * @see GenericGeneratorSpec
 * @see GenericGeneratorTest
 */
class GenericGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        return true;
    }

    public function handle(Definition $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
