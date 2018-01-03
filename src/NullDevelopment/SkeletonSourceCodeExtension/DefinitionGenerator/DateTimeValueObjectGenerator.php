<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonSourceCodeExtension\Result;

/**
 * @see DateTimeValueObjectGeneratorSpec
 * @see DateTimeValueObjectGeneratorTest
 */
class DateTimeValueObjectGenerator extends BaseSourceCodeDefinitionGenerator
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
