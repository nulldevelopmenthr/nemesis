<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataTypeName\TraitName;

/**
 * @see TraitNameCollectionFactorySpec
 * @see TraitNameCollectionFactoryTest
 */
class TraitNameCollectionFactory
{
    public function create(array $input): array
    {
        $collection = [];

        foreach ($input as $traitName) {
            $collection[] = TraitName::create($traitName);
        }

        return $collection;
    }
}
