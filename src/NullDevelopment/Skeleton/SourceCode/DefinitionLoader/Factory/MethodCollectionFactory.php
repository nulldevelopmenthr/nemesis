<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use Exception;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;

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

        foreach ($input as $methodName => $methodInput) {
            if ('getter' === $methodInput['type']) {
                $property = new Property(
                    $methodInput['property']['name'],
                    ClassName::create($methodInput['property']['instanceOf']),
                    $methodInput['property']['nullable'],
                    $methodInput['property']['hasDefault'],
                    $methodInput['property']['default'],
                    new Visibility('private')
                );

                $result[] = new GetterMethod($methodName, $property);
            } else {
                throw new Exception('ERR 322315002: Only getter is implemented for now!');
            }
        }

        return $result;
    }

    protected function getDefaultValues()
    {
        return [
            'type'       => 'getter',
            'parameters' => [],
        ];
    }
}
