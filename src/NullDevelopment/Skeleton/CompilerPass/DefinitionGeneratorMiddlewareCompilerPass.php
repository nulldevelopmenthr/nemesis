<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\CompilerPass;

use NullDevelopment\Skeleton\TacticianMiddleware\DefinitionGeneratorMiddleware;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class DefinitionGeneratorMiddlewareCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(DefinitionGeneratorMiddleware::class)) {
            return;
        }

        $definition = $container->findDefinition(DefinitionGeneratorMiddleware::class);

        $taggedServices = $container->findTaggedServiceIds('skeleton.definition_generator');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
