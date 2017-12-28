<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\ConstructorMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;

/**
 * @see LetMethodFactorySpec
 * @see LetMethodFactoryTest
 */
class LetMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
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
