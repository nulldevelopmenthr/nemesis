<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDeserializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;

/**
 * @see SpecDeserializeMethodFactorySpec
 * @see SpecDeserializeMethodFactoryTest
 */
class SpecDeserializeMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof DeserializeMethod) {
                $methods[] = $this->createFromDeserializeMethod($method);
            }
        }

        return $methods;
    }

    public function createFromDeserializeMethod(DeserializeMethod $method): SpecDeserializeMethod
    {
        return new SpecDeserializeMethod($method->getClassName(), $method->getProperties());
    }
}
