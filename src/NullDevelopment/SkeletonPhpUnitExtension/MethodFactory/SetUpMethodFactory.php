<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\ConstructorMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;

/**
 * @see SetUpMethodFactorySpec
 * @see SetUpMethodFactoryTest
 */
class SetUpMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        if (null === $definition->getConstructorMethod()) {
            return [
                 new SetUpMethod($definition->getInstanceOf(), []),
            ];
        }

        return [
            $this->createFromConstructorMethod($definition->getInstanceOf(), $definition->getConstructorMethod()),
        ];
    }

    public function createFromConstructorMethod(ClassName $className, ConstructorMethod $constructorMethod): SetUpMethod
    {
        return new SetUpMethod($className, $constructorMethod->getParameters());
    }
}
