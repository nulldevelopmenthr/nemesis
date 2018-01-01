<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory;

/**
 * @see InterfaceLoaderSpec
 * @see InterfaceLoaderTest
 */
class InterfaceLoader implements DefinitionLoader
{
    /** @var ConstantCollectionFactory */
    private $constantCollectionFactory;

    /** @var MethodCollectionFactory */
    private $methodCollectionFactory;

    public function __construct(
        ConstantCollectionFactory $constantCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->constantCollectionFactory = $constantCollectionFactory;
        $this->methodCollectionFactory   = $methodCollectionFactory;
    }

    public function supports(array $input): bool
    {
        if ('Interface' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): InterfaceDefinition
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $parent    = $this->extractParent($input);
        $constants = $this->constantCollectionFactory->create($input['constants']);
        $methods   = $this->methodCollectionFactory->create($input['methods']);

        return new InterfaceDefinition(InterfaceName::create($data['instanceOf']), $parent, $constants, $methods);
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'Interface',
            'instanceOf' => null,
            'parent'     => null,
            'constants'  => [],
            'methods'    => [],
        ];
    }

    private function extractParent(array $data): ?InterfaceName
    {
        if (null === $data['parent']) {
            return null;
        }
        if (true === is_array($data['parent'])) {
            return InterfaceName::create($data['parent']['instanceOf'], $data['parent']['alias']);
        }

        return InterfaceName::create($data['parent']);
    }
}
