<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory;

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

        foreach ($input as $interfaceAlias => $interfaceName) {
            $alias = null;
            if (is_string($interfaceAlias)) {
                $alias = $interfaceAlias;
            }
            $collection[] = InterfaceName::create($interfaceName, $alias);
        }

        return $collection;
    }
}
