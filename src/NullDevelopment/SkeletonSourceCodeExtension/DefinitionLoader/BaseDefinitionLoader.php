<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\Core\DefinitionLoader;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;

/**
 * @see SimpleEntityLoaderSpec
 * @see SimpleEntityLoaderTest
 *
 * @SuppressWarnings("PHPMD.NumberOfChildren")
 */
abstract class BaseDefinitionLoader implements DefinitionLoader
{
    /** @var InterfaceNameCollectionFactory */
    protected $interfaceNameCollectionFactory;

    /** @var TraitNameCollectionFactory */
    protected $traitNameCollectionFactory;

    /** @var ConstantCollectionFactory */
    protected $constantCollectionFactory;

    /** @var ConstructorMethodFactory */
    protected $constructorMethodFactory;

    /** @var PropertyCollectionFactory */
    protected $propertyCollectionFactory;

    /** @var MethodCollectionFactory */
    protected $methodCollectionFactory;

    public function __construct(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstantCollectionFactory $constantCollectionFactory,
        ConstructorMethodFactory $constructorMethodFactory,
        PropertyCollectionFactory $propertyCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->interfaceNameCollectionFactory = $interfaceNameCollectionFactory;
        $this->traitNameCollectionFactory     = $traitNameCollectionFactory;
        $this->constantCollectionFactory      = $constantCollectionFactory;
        $this->constructorMethodFactory       = $constructorMethodFactory;
        $this->propertyCollectionFactory      = $propertyCollectionFactory;
        $this->methodCollectionFactory        = $methodCollectionFactory;
    }

    abstract public function supports(array $input): bool;

    protected function extractParent(array $data): ?ClassName
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
