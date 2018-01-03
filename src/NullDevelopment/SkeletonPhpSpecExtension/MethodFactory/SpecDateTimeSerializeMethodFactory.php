<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeSerializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeSerializeMethod;

/**
 * @see SpecDateTimeSerializeMethodFactorySpec
 * @see SpecDateTimeSerializeMethodFactoryTest
 */
class SpecDateTimeSerializeMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof DateTimeSerializeMethod) {
                $methods[] = $this->createFromDateTimeSerializeMethod($method);
            }
        }

        return $methods;
    }

    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    public function createFromDateTimeSerializeMethod(DateTimeSerializeMethod $method): SpecDateTimeSerializeMethod
    {
        return new SpecDateTimeSerializeMethod();
    }
}
