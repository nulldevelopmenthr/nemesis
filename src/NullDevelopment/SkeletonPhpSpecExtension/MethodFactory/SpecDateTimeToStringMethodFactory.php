<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeToStringMethod;

/**
 * @see SpecDateTimeToStringMethodFactorySpec
 * @see SpecDateTimeToStringMethodFactoryTest
 */
class SpecDateTimeToStringMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof DateTimeToStringMethod) {
                $methods[] = $this->createFromDateTimeToStringMethod($method);
            }
        }

        return $methods;
    }

    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    public function createFromDateTimeToStringMethod(DateTimeToStringMethod $method): SpecDateTimeToStringMethod
    {
        return new SpecDateTimeToStringMethod();
    }
}
