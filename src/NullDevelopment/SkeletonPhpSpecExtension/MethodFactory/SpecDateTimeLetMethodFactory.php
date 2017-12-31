<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeLetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;

/**
 * @see SpecDateTimeLetMethodFactorySpec
 * @see SpecDateTimeLetMethodFactoryTest
 */
class SpecDateTimeLetMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
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
