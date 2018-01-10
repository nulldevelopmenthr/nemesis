<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\BaseDefinitionLoader;

/**
 * @see EventSourcingRepositoryLoaderSpec
 * @see EventSourcingRepositoryLoaderTest
 */
class EventSourcingRepositoryLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('BroadwayEventSourcingRepository' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): EventSourcingRepository
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
        $entity            = ClassName::create($data['entity']);

        foreach ($this->methodCollectionFactory->create($data['methods']) as $method) {
            $methods[] = $method;
        }

        return new EventSourcingRepository(
            $className, $parent, $interfaces, $traits, $constants, $properties, $methods, $entity
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'EventSourcingRepository',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
            'entity'      => '',
        ];
    }
}
