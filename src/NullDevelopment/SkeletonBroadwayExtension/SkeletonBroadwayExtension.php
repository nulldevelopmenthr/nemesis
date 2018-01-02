<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class SkeletonBroadwayExtension extends Extension
{
    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/'));
        $loader->load('cli.yml');

        $loader->load('middleware.yaml');
        $loader->load('services.yaml');
        $loader->load('command-definition-services.yaml');
        $loader->load('event-definition-services.yaml');
        $loader->load('event_sourced_entity-definition-services.yaml');
        $loader->load('event_sourced_aggregate_root-definition-services.yaml');
        $loader->load('event_sourcing_repository-definition-services.yaml');
    }
}
