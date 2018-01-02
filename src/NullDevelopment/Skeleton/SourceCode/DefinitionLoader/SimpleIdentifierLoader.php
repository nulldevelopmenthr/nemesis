<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;

/**
 * @see SimpleIdentifierLoaderSpec
 * @see SimpleIdentifierLoaderTest
 */
class SimpleIdentifierLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('SimpleIdentifier' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): SimpleIdentifier
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $className         = ClassName::create($data['instanceOf']);
        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $constants         = $this->constantCollectionFactory->create($data['constants']);
        $properties        = $this->propertyCollectionFactory->create(array_merge($data['properties'], $data['constructor']));
        $constructorMethod = $this->constructorMethodFactory->create($data['constructor']);
        $methods           = [$constructorMethod];

        foreach ($this->methodCollectionFactory->create($data['methods']) as $method) {
            $methods[] = $method;
        }

        foreach ($properties as $property) {
            $methods[] = GetterMethod::create($property);
            $methods[] = new GetterMethod('getId', $property);
            $methods[] = new ToStringMethod($property);
        }

        $methods[] = new SerializeMethod($className, $properties);
        $methods[] = new DeserializeMethod($className, $properties);

        return new SimpleIdentifier(
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
            'type'        => 'SimpleIdentifier',
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
