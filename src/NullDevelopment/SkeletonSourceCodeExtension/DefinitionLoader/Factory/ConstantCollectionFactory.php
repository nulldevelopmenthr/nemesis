<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\ConstantName;

/**
 * @see ConstantCollectionFactorySpec
 * @see ConstantCollectionFactoryTest
 */
class ConstantCollectionFactory
{
    public function create(array $input): array
    {
        $collection = [];

        foreach ($input as $constantName => $constantValue) {
            $collection[] = new Constant(new ConstantName($constantName), $constantValue);
        }

        return $collection;
    }
}
