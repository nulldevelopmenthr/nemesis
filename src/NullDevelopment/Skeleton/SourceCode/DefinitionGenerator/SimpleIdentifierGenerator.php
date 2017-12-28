<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SimpleIdentifierGeneratorSpec
 * @see SimpleIdentifierGeneratorTest
 */
class SimpleIdentifierGenerator extends BaseDefinitionGenerator
{
    public function supports(ClassType $definition): bool
    {
        if ($definition instanceof SimpleIdentifier) {
            return true;
        }

        return false;
    }

    public function handleSimpleIdentifier(SimpleIdentifier $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
