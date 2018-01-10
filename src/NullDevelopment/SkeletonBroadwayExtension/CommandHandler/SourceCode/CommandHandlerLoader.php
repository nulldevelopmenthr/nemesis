<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method\LoadMethod;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method\SaveMethod;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\BaseDefinitionLoader;

/**
 * @see CommandHandlerLoaderSpec
 * @see CommandHandlerLoaderTest
 */
class CommandHandlerLoader extends BaseDefinitionLoader
{
    public function supports(array $input): bool
    {
        if ('BroadwayCommandHandler' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): CommandHandler
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $className         = ClassName::create($data['instanceOf']);
        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $constants         = $this->constantCollectionFactory->create($data['constants']);
        $properties        = $this->propertyCollectionFactory->create(array_merge($data['constructor'], $data['properties']));
        $constructorMethod = $this->constructorMethodFactory->create($data['constructor']);
        $methods           = [$constructorMethod];
        $model             = ClassName::create($data['model']);
        $modelId           = ClassName::create($data['modelId']);

        foreach ($this->methodCollectionFactory->create($data['methods']) as $method) {
            $methods[] = $method;
        }

        $methods[] = new LoadMethod($model, $modelId);
        $methods[] = new SaveMethod($model);

        return new CommandHandler(
            $className, $parent, $interfaces, $traits, $constants, $properties, $methods, $model, $modelId
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'CommandHandler',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
            'model'       => null,
            'modelId'     => null,
        ];
    }
}
