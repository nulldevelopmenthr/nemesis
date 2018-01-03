<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class DefinitionGeneratorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definitionIds = $container->findTaggedServiceIds('skeleton2.definition_generator');

        $taggedServices = $container->findTaggedServiceIds('skeleton2.method_generator');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }
        foreach (array_keys($definitionIds) as $definitionId) {
            $definition = $container->findDefinition($definitionId);
            $definition->setArgument(0, $references);
        }
    }
}
