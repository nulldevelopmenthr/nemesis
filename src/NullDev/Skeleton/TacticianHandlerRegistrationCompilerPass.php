<?php

declare(strict_types=1);

namespace NullDev\Skeleton;

use InvalidArgumentException;
use League\Tactician\Handler\Locator\InMemoryLocator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class TacticianHandlerRegistrationCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(InMemoryLocator::class)) {
            return;
        }

        $definition = $container->findDefinition(InMemoryLocator::class);

        $taggedServices = $container->findTaggedServiceIds('tactician.handler');

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                if (!isset($attributes['command'])) {
                    throw new InvalidArgumentException(
                        'The tactician.handler tag must always have a command attribute'
                    );
                }
                $definition->addMethodCall('addHandler', [new Reference($id), $attributes['command']]);
            }
        }
    }
}
