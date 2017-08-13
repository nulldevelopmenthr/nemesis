<?php

declare(strict_types=1);

namespace NullDev\Skeleton;

use Exception;
use League\Tactician\CommandBus;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class TacticianMiddlewareRegistrationCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(CommandBus::class)) {
            return;
        }

        $definition = $container->findDefinition(CommandBus::class);

        $services = [];

        foreach ($container->findTaggedServiceIds('tactician.middleware', true) as $serviceId => $attributes) {
            if (false === isset($attributes[0]['priority'])) {
                throw new Exception('Priority must me defined on middleware'.$serviceId);
            }

            $priority              = $attributes[0]['priority'];
            $services[$priority][] = new Reference($serviceId);
        }
        if ($services) {
            krsort($services);
            $services = call_user_func_array('array_merge', $services);
        }

        $definition->setArgument(0, $services);
    }
}
