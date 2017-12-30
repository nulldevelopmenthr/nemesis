<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;

/**
 * @see DateTimeValueObjectLoaderSpec
 * @see DateTimeValueObjectLoaderTest
 */
class DateTimeValueObjectLoader implements DefinitionLoader
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

        $className  = ClassName::create($data['instanceOf']);
        $parent     = $this->extractParent($data);
        $interfaces = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits     = $this->traitNameCollectionFactory->create($data['traits']);
        $properties = [];
        $methods    = [
            new DateTimeToStringMethod(),
            new DateTimeCreateFromFormatMethod(),
            new DateTimeSerializeMethod(),
            new DateTimeDeserializeMethod($className),
        ];

        return new DateTimeValueObject(
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
        if (true === is_array($data['parent'])) {
            return ClassName::create($data['parent']['instanceOf'], $data['parent']['alias']);
        }

        return ClassName::create($data['parent']);
    }
}
