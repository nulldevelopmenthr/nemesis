<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;

/**
 * @see DateTimeValueObjectLoaderSpec
 * @see DateTimeValueObjectLoaderTest
 */
class DateTimeValueObjectLoader implements DefinitionConfigurationLoader
{
    /** @var InterfaceNameCollectionFactory */
    private $interfaceNameCollectionFactory;
    /** @var TraitNameCollectionFactory */
    private $traitNameCollectionFactory;

    public function __construct(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory
    ) {
        $this->interfaceNameCollectionFactory = $interfaceNameCollectionFactory;
        $this->traitNameCollectionFactory     = $traitNameCollectionFactory;
    }

    public function supports(array $input): bool
    {
        if ('DateTimeValueObject' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): DateTimeValueObject
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $parent     = $this->extractParent($data);
        $interfaces = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits     = $this->traitNameCollectionFactory->create($data['traits']);

        return new DateTimeValueObject(
            ClassName::create($data['instanceOf']),
            $parent,
            $interfaces,
            $traits,
            null,
            []
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'DateTimeValueObject',
            'instanceOf' => null,
            'parent'     => '\DateTime',
            'interfaces' => [],
            'traits'     => [],
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
