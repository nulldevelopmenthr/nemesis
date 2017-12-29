<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;

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
            new InitializableMethod($definition->getName(), $definition->getParent(), $definition->getInterfaces()),
        ];
    }
}
