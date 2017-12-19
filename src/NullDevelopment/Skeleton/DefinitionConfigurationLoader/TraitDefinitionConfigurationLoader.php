<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\PhpStructure\Type\TraitDefinition;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;

/**
 * @see TraitDefinitionConfigurationLoaderSpec
 * @see TraitDefinitionConfigurationLoaderTest
 */
class TraitDefinitionConfigurationLoader implements DefinitionConfigurationLoader
{
    /** @var TraitNameCollectionFactory */
    private $traitNameCollectionFactory;
    /** @var ConstantCollectionFactory */
    private $constantCollectionFactory;
    /** @var PropertyCollectionFactory */
    private $propertyCollectionFactory;
    /** @var MethodCollectionFactory */
    private $methodCollectionFactory;

    public function __construct(
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstantCollectionFactory $constantCollectionFactory,
        PropertyCollectionFactory $propertyCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->traitNameCollectionFactory = $traitNameCollectionFactory;
        $this->constantCollectionFactory  = $constantCollectionFactory;
        $this->propertyCollectionFactory  = $propertyCollectionFactory;
        $this->methodCollectionFactory    = $methodCollectionFactory;
    }

    public function supports(array $input): bool
    {
        if ('Trait' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): TraitDefinition
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $traits     = $this->traitNameCollectionFactory->create($input['traits']);
        $constants  = $this->constantCollectionFactory->create($input['constants']);
        $properties = $this->propertyCollectionFactory->create($input['properties']);
        $methods    = $this->methodCollectionFactory->create($input['methods']);

        return new TraitDefinition(
            TraitName::create($data['name']), $traits, $constants, $properties, $methods
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'Trait',
            'name'       => null,
            'traits'     => [],
            'constants'  => [],
            'properties' => [],
            'methods'    => [],
        ];
    }
}
