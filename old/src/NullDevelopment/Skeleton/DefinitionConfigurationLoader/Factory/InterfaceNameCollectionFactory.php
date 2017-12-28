<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;

/**
 * @see InterfaceNameCollectionFactorySpec
 * @see InterfaceNameCollectionFactoryTest
 */
class InterfaceNameCollectionFactory
{
    public function create(array $input): array
    {
        $collection = [];

        foreach ($input as $traitName) {
            $collection[] = InterfaceName::create($traitName);
        }

        return $collection;
    }
}
