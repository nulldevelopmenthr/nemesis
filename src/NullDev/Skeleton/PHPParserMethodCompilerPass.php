<?php

declare(strict_types=1);

namespace NullDev\Skeleton;

use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @see PHPParserMethodCompilerPassSpec
 * @see PHPParserMethodCompilerPassTest
 *
 * @codeCoverageIgnore
 */
class PHPParserMethodCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(MethodFactory::class)) {
            return;
        }

        $definition = $container->findDefinition(MethodFactory::class);

        $taggedServices = $container->findTaggedServiceIds('skeleton.method_generator');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
