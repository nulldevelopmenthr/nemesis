<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\BaseDefinitionLoader;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\HasPropertyMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SetterMethod;

/**
 * @see DoctrineReadEntityLoaderSpec
 * @see DoctrineReadEntityLoaderTest
 */
class DoctrineReadEntityLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('DoctrineReadEntity' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): DoctrineReadEntity
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

        foreach ($properties as $property) {
            if (true === $property->isNullable()) {
                $methods[] = HasPropertyMethod::create($property);
            }
            $methods[] = GetterMethod::create($property);
            $methods[] = SetterMethod::create($property);
        }

        $methods[] = new SerializeMethod($className, $properties);
        $methods[] = new DeserializeMethod($className, $properties);

        return new DoctrineReadEntity($className, $parent, $interfaces, $traits, $constants, $properties, $methods);
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'DoctrineReadEntity',
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
