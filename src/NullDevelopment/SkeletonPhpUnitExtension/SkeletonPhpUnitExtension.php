<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class SkeletonPhpUnitExtension extends Extension
{
    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/'));
        $loader->load('cli.yml');

        $loader->load('middleware.yaml');
        $loader->load('services.yaml');
        $loader->load('definition-services.yaml');
    }
}
