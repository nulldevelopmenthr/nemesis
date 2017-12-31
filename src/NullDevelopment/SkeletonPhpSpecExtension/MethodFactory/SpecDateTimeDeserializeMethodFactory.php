<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeDeserializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;

/**
 * @see SpecDateTimeDeserializeMethodFactorySpec
 * @see SpecDateTimeDeserializeMethodFactoryTest
 */
class SpecDateTimeDeserializeMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof DateTimeDeserializeMethod) {
                $methods[] = $this->createFromDateTimeDeserializeMethod($method);
            }
        }

        return $methods;
    }

    public function createFromDateTimeDeserializeMethod(DateTimeDeserializeMethod $method): SpecDateTimeDeserializeMethod
    {
        return new SpecDateTimeDeserializeMethod($method->getClassName());
    }
}
