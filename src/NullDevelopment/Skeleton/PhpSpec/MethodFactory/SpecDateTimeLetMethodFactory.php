<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeLetMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;

/**
 * @see SpecDateTimeLetMethodFactorySpec
 * @see SpecDateTimeLetMethodFactoryTest
 */
class SpecDateTimeLetMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
    {
        return [
            $this->createFromConstructorMethod(),
        ];
    }

    public function createFromConstructorMethod(): SpecDateTimeLetMethod
    {
        return new SpecDateTimeLetMethod();
    }
}
