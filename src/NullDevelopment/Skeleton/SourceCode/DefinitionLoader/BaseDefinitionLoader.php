<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;

/**
 * @see SimpleEntityLoaderSpec
 * @see SimpleEntityLoaderTest
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
