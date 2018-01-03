<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\BaseDefinitionLoader;

/**
 * @see EventSourcedEntityLoaderSpec
 * @see EventSourcedEntityLoaderTest
 */
class EventSourcedEntityLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('BroadwayEventSourcedEntity' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): EventSourcedEntity
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

        return new EventSourcedEntity(
            $className,
            $parent,
            $interfaces,
            $traits,
            $constants,
            $properties,
            $methods
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'EventSourcedEntity',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
        ];
    }
}
