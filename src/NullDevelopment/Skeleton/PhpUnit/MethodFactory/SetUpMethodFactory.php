<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\ConstructorMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpUnit\Method\SetUpMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;

/**
 * @see SetUpMethodFactorySpec
 * @see SetUpMethodFactoryTest
 */
class SetUpMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
    {
        if (null === $definition->getConstructorMethod()) {
            return [];
        }

        return [
            $this->createFromConstructorMethod($definition->getName(), $definition->getConstructorMethod()),
        ];
    }

    public function createFromConstructorMethod(ClassName $className, ConstructorMethod $constructorMethod): SetUpMethod
    {
        return new SetUpMethod($className, $constructorMethod->getParameters());
    }
}
