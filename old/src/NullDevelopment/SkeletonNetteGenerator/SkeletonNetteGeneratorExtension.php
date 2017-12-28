<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator;

use NullDevelopment\SkeletonNetteGenerator\CompilerPass\PhpSpecGeneratorRegistrationCompilerPass;
use NullDevelopment\SkeletonNetteGenerator\CompilerPass\PhpUnitGeneratorRegistrationCompilerPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class SkeletonNetteGeneratorExtension extends Extension
{
    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->addCompilerPass(new PhpSpecGeneratorRegistrationCompilerPass());
        $container->addCompilerPass(new PhpUnitGeneratorRegistrationCompilerPass());

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/'));
        $loader->load('services.yml');
        $loader->load('cli.yml');
    }
}
