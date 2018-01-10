<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\Core\DefinitionLoader;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeDeserializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeSerializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeToStringMethod;

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

    /** @var ConstantCollectionFactory */
    private $constantCollectionFactory;

    public function __construct(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstantCollectionFactory $constantCollectionFactory
    ) {
        $this->interfaceNameCollectionFactory = $interfaceNameCollectionFactory;
        $this->traitNameCollectionFactory     = $traitNameCollectionFactory;
        $this->constantCollectionFactory      = $constantCollectionFactory;
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
        $constants  = $this->constantCollectionFactory->create($data['constants']);
        $properties = [];
        $methods    = [
            new DateTimeToStringMethod(),
            new DateTimeCreateFromFormatMethod(),
            new DateTimeSerializeMethod(),
            new DateTimeDeserializeMethod($className),
        ];

        return new DateTimeValueObject($className, $parent, $interfaces, $traits, $constants, $properties, $methods);
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'DateTimeValueObject',
            'instanceOf' => null,
            'parent'     => '\DateTime',
            'interfaces' => [],
            'traits'     => [],
            'constants'  => [],
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
