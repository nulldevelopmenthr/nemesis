<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataType\Visibility;

/**
 * @see MethodCollectionFactorySpec
 * @see MethodCollectionFactoryTest
 */
class MethodCollectionFactory
{
    public function create(?array $input): array
    {
        if (null === $input) {
            return [];
        }

        $result = [];

        return $result;
    }

    protected function getDefaultValues()
    {
        return [
            'instanceOf' => 'int',
            'nullable'   => false,
            'hasDefault' => false,
            'default'    => null,
            'visibility' => Visibility::PUBLIC,
        ];
    }
}
