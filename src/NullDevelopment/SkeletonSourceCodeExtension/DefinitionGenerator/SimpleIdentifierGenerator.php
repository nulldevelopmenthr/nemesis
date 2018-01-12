<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleIdentifier;

/**
 * @see SimpleIdentifierGeneratorSpec
 * @see SimpleIdentifierGeneratorTest
 */
class SimpleIdentifierGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SimpleIdentifier) {
            return true;
        }

        return false;
    }

    public function handle(SimpleIdentifier $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
