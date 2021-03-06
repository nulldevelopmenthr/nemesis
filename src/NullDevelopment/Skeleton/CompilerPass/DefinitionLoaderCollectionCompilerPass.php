<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\CompilerPass;

use NullDevelopment\Skeleton\Core\DefinitionLoaderCollection;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class DefinitionLoaderCollectionCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(DefinitionLoaderCollection::class)) {
            return;
        }

        $definition = $container->findDefinition(DefinitionLoaderCollection::class);

        $taggedServices = $container->findTaggedServiceIds('skeleton.definition_loader');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
