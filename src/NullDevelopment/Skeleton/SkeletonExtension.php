<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

use NullDevelopment\Skeleton\CompilerPass\DefinitionLoaderCollectionCompilerPass;
use NullDevelopment\Skeleton\CompilerPass\ObjectConfigurationLoaderCompilerPass;
use NullDevelopment\Skeleton\Core\DefinitionLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class SkeletonExtension extends Extension
{
    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(DefinitionConfigurationLoader::class)
            ->addTag('skeleton.object_configuration_loader');
        $container->addCompilerPass(new ObjectConfigurationLoaderCompilerPass());

        $container->registerForAutoconfiguration(DefinitionLoader::class)
            ->addTag('skeleton.definition_loader');
        $container->addCompilerPass(new DefinitionLoaderCollectionCompilerPass());

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/'));
        $loader->load('cli.yml');

        $loader->load('middleware-services.yaml');
        $loader->load('misc-services.yaml');
        $loader->load('source-code-definition-services.yaml');
    }
}
