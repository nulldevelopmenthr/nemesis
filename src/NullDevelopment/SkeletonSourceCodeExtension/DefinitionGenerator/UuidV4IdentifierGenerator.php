<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;

/**
 * @see UuidV4IdentifierGeneratorSpec
 * @see UuidV4IdentifierGeneratorTest
 */
class UuidV4IdentifierGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof UuidV4Identifier) {
            return true;
        }

        return false;
    }

    public function handle(UuidV4Identifier $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
