<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\ConstructorMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;

/**
 * @see LetMethodFactorySpec
 * @see LetMethodFactoryTest
 */
class LetMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        if (null === $definition->getConstructorMethod()) {
            return [];
        }

        return [
            $this->createFromConstructorMethod($definition->getConstructorMethod()),
        ];
    }

    public function createFromConstructorMethod(ConstructorMethod $constructorMethod): LetMethod
    {
        return new LetMethod($constructorMethod->getParameters());
    }
}
