<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\UuidV4CreateMethod;

/**
 * @see UuidV4IdentifierLoaderSpec
 * @see UuidV4IdentifierLoaderTest
 */
class UuidV4IdentifierLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('UuidV4Identifier' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): UuidV4Identifier
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $idProperty = Property::private('id', ClassName::create('string'));

        $className         = ClassName::create($data['instanceOf']);
        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $constants         = $this->constantCollectionFactory->create($data['constants']);
        $properties        = [$idProperty];
        $constructorMethod = new ConstructorMethod($properties);
        $methods           = [$constructorMethod];

        foreach ($this->methodCollectionFactory->create($data['methods']) as $method) {
            $methods[] = $method;
        }

        $methods[] = new GetterMethod('getId', $idProperty);
        $methods[] = new ToStringMethod($idProperty);

        $methods[] = new SerializeMethod($className, $properties);
        $methods[] = new DeserializeMethod($className, $properties);
        $methods[] = new UuidV4CreateMethod();

        return new UuidV4Identifier($className, $parent, $interfaces, $traits, $constants, $properties, $methods);
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'UuidV4Identifier',
            'instanceOf' => null,
            'parent'     => null,
            'interfaces' => [],
            'traits'     => [],
            'constants'  => [],
            'methods'    => [],
        ];
    }
}
