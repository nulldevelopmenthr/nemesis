<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\CompilerPass;

use Exception;
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

        $references = [];

        foreach ($container->findTaggedServiceIds('skeleton.definition_generator', true) as $serviceId => $attributes) {
            if (false === isset($attributes[0]['priority'])) {
                throw new Exception('Priority must me defined on definition generators'.$serviceId);
            }

            $priority                = $attributes[0]['priority'];
            $references[$priority][] = new Reference($serviceId);
        }
        if ($references) {
            krsort($references);
            $references = call_user_func_array('array_merge', $references);
        }

        $definition->setArgument(0, $references);
    }
}
