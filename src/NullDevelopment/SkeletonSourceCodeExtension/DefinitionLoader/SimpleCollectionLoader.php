<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleCollection;

/**
 * @see SimpleCollectionLoaderSpec
 * @see SimpleCollectionLoaderTest
 */
class SimpleCollectionLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('SimpleCollection' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): SimpleCollection
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $className         = ClassName::create($data['instanceOf']);
        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $constants         = $this->constantCollectionFactory->create($data['constants']);
        $properties        = $this->propertyCollectionFactory->create(array_merge($data['constructor'], $data['properties']));
        $constructorMethod = $this->constructorMethodFactory->create($data['constructor']);
        $methods           = [$constructorMethod];

        foreach ($this->methodCollectionFactory->create($data['methods']) as $method) {
            $methods[] = $method;
        }

        $collectionOf = new CollectionOf(
            ClassName::create($data['collectionOf']['instanceOf']),
            $data['collectionOf']['accessor'],
            ClassName::create($data['collectionOf']['has'])
        );

        return new SimpleCollection(
            $className,
            $parent,
            $interfaces,
            $traits,
            $constants,
            $properties,
            $methods,
            $collectionOf,
            $data['serialization']
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'          => 'SimpleCollection',
            'instanceOf'    => null,
            'parent'        => null,
            'interfaces'    => [],
            'traits'        => [],
            'constants'     => [],
            'properties'    => [],
            'methods'       => [],
            'constructor'   => [],
            'serialization' => true,
        ];
    }
}
