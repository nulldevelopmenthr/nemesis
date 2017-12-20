<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\CompilerPass;

use NullDevelopment\SkeletonNetteGenerator\PhpUnit\PHPUnitTestMiddleware;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class PhpUnitGeneratorRegistrationCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(PHPUnitTestMiddleware::class)) {
            return;
        }

        $definition = $container->findDefinition(PHPUnitTestMiddleware::class);

        $taggedServices = $container->findTaggedServiceIds('skeleton.php_unit_generator');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
