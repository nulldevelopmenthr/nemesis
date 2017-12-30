<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;

/**
 * @see SingleValueObjectLoaderSpec
 * @see SingleValueObjectLoaderTest
 */
class SingleValueObjectLoader implements DefinitionLoader
{
    /** @var InterfaceNameCollectionFactory */
    private $interfaceNameCollectionFactory;

    /** @var TraitNameCollectionFactory */
    private $traitNameCollectionFactory;

    /** @var ConstructorMethodFactory */
    private $constructorMethodFactory;

    /** @var PropertyCollectionFactory */
    private $propertyCollectionFactory;

    public function __construct(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstructorMethodFactory $constructorMethodFactory,
        PropertyCollectionFactory $propertyCollectionFactory
    ) {
        $this->interfaceNameCollectionFactory = $interfaceNameCollectionFactory;
        $this->traitNameCollectionFactory     = $traitNameCollectionFactory;
        $this->constructorMethodFactory       = $constructorMethodFactory;
        $this->propertyCollectionFactory      = $propertyCollectionFactory;
    }

    public function supports(array $input): bool
    {
        if ('SingleValueObject' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): SingleValueObject
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $className         = ClassName::create($data['instanceOf']);
        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $properties        = $this->propertyCollectionFactory->create(array_merge($data['properties'], $data['constructor']));
        $constructorMethod = $this->constructorMethodFactory->create($data['constructor']);
        $methods           = [$constructorMethod];

        foreach ($properties as $property) {
            $methodName = 'get'.ucfirst($property->getName());
            $methods[]  = new GetterMethod($methodName, $property);
            $methods[]  = new GetterMethod('getValue', $property);
            $methods[]  = new ToStringMethod($property);
        }

        $methods[] = new SerializeMethod($className, $properties);
        $methods[] = new DeserializeMethod($className, $properties);

        return new SingleValueObject(
            $className,
            $parent,
            $interfaces,
            $traits,
            $properties,
            $methods
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'SingleValueObject',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
        ];
    }

    private function extractParent(array $data): ?ClassName
    {
        if (null === $data['parent']) {
            return null;
        }
        if (true === is_array($data['parent'])) {
            return ClassName::create($data['parent']['instanceOf'], $data['parent']['alias']);
        }

        return ClassName::create($data['parent']);
    }
}
