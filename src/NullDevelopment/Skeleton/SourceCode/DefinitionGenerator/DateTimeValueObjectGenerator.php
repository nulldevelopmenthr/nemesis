<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator\BaseClassDefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see DateTimeValueObjectGeneratorSpec
 * @see DateTimeValueObjectGeneratorTest
 */
class DateTimeValueObjectGenerator extends BaseClassDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof DateTimeValueObject) {
            return true;
        }

        return false;
    }

    public function handleDateTimeValueObject(DateTimeValueObject $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
