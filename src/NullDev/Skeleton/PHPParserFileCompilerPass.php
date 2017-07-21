<?php

declare(strict_types=1);

namespace NullDev\Skeleton;

use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @see PHPParserFileCompilerPassSpec
 * @see PHPParserFileCompilerPassTest
 */
class PHPParserFileCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // always first check if the primary service is defined
        if (!$container->has(MethodFactory::class)) {
            return;
        }

        $definition = $container->findDefinition(MethodFactory::class);

        $taggedServices = $container->findTaggedServiceIds('skeleton.file_generator');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
