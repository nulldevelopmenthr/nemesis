<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SingleValueObjectGeneratorSpec
 * @see SingleValueObjectGeneratorTest
 */
class SingleValueObjectGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SingleValueObject) {
            return true;
        }

        return false;
    }

    public function handleSingleValueObject(SingleValueObject $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
