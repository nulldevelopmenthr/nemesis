<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\Method\RemoveMethod;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\Method\SaveMethod;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\BaseDefinitionLoader;

/**
 * @see DoctrineReadRepositoryLoaderSpec
 * @see DoctrineReadRepositoryLoaderTest
 */
class DoctrineReadRepositoryLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('DoctrineReadRepository' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): DoctrineReadRepository
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $className  = ClassName::create($data['instanceOf']);
        $parent     = $this->extractParent($data);
        $interfaces = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits     = $this->traitNameCollectionFactory->create($data['traits']);
        $constants  = $this->constantCollectionFactory->create($data['constants']);
        $properties = [];
        $methods    = [
            new SaveMethod(ClassName::create($data['entity'])),
            new RemoveMethod(ClassName::create($data['entity'])),
        ];

        return new DoctrineReadRepository(
            $className, $parent, $interfaces, $traits, $constants, $properties, $methods
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'DoctrineReadRepository',
            'instanceOf' => null,
            'parent'     => null,
            'interfaces' => [],
            'traits'     => [],
            'constants'  => [],
            'properties' => [],
            'methods'    => [],
            'entity'     => null,
        ];
    }
}
