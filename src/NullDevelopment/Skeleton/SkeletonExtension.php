<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

use NullDevelopment\Skeleton\CompilerPass\DefinitionGeneratorCompilerPass;
use NullDevelopment\Skeleton\CompilerPass\DefinitionGeneratorMiddlewareCompilerPass;
use NullDevelopment\Skeleton\CompilerPass\DefinitionLoaderCollectionCompilerPass;
use NullDevelopment\Skeleton\CompilerPass\ObjectConfigurationLoaderCompilerPass;
use NullDevelopment\Skeleton\Core\AutowiredDefinitionGenerator;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\DefinitionLoader;
use NullDevelopment\Skeleton\Core\MethodGenerator;
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

        /// Definition generators
        ///

        $container->registerForAutoconfiguration(AutowiredDefinitionGenerator::class)
            ->addTag('skeleton2.definition_generator');
        $container->registerForAutoconfiguration(MethodGenerator::class)
            ->addTag('skeleton2.method_generator');
        $container->registerForAutoconfiguration(DefinitionGenerator::class)
            ->addTag('skeleton.definition_generator');

        $container->addCompilerPass(new DefinitionGeneratorCompilerPass());
        $container->addCompilerPass(new DefinitionGeneratorMiddlewareCompilerPass());

        ///

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/'));
        $loader->load('cli.yml');

        $loader->load('middleware-services.yaml');
        $loader->load('services.yaml');
    }
}
