<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;

/**
 * @see InitializableMethodFactorySpec
 * @see InitializableMethodFactoryTest
 */
class InitializableMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        return [
            new InitializableMethod(
                $definition->getInstanceOf(), $definition->getParent(), $definition->getInterfaces()
            ),
        ];
    }
}
