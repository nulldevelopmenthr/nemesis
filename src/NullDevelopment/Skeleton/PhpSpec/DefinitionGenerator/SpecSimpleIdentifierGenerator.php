<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGenerator;

/**
 * @see SpecSimpleIdentifierGeneratorSpec
 * @see SpecSimpleIdentifierGeneratorTest
 */
class SpecSimpleIdentifierGenerator extends BaseDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecSimpleIdentifier) {
            return true;
        }

        return false;
    }
}
