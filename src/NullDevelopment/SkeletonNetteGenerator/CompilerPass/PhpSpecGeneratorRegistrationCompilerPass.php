<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\CompilerPass;

use NullDevelopment\SkeletonNetteGenerator\PhpSpec\PHPSpecMiddleware;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class PhpSpecGeneratorRegistrationCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(PHPSpecMiddleware::class)) {
            return;
        }

        $definition = $container->findDefinition(PHPSpecMiddleware::class);

        $taggedServices = $container->findTaggedServiceIds('skeleton.php_spec_generator');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
