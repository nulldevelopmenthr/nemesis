<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class BroadwaySkeletonExtension extends Extension
{
    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/'));
        $loader->load('services.yml');
        $loader->load('cli.yml');
    }
}
