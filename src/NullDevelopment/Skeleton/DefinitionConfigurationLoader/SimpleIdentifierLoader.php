<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;

/**
 * @see SimpleIdentifierLoaderSpec
 * @see SimpleIdentifierLoaderTest
 */
class SimpleIdentifierLoader implements DefinitionConfigurationLoader
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
        if ('SimpleIdentifier' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): SimpleIdentifier
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $constructorMethod = $this->constructorMethodFactory->create($data['constructor']);
        $properties        = $this->propertyCollectionFactory->create($data['constructor']);

        return new SimpleIdentifier(
            ClassName::create($data['instanceOf']),
            $parent,
            $interfaces,
            $traits,
            $constructorMethod,
            $properties
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
            'constructor' => [],
            'properties'  => [],
        ];
    }

    private function extractParent(array $data): ?ClassName
    {
        if (null === $data['parent']) {
            return null;
        }

        return ClassName::create($data['parent']);
    }
}
