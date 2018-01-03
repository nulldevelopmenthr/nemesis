<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSerializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;

/**
 * @see SpecSerializeMethodFactorySpec
 * @see SpecSerializeMethodFactoryTest
 */
class SpecSerializeMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof SerializeMethod) {
                $methods[] = $this->createFromSerializeMethod($method);
            }
        }

        return $methods;
    }

    public function createFromSerializeMethod(SerializeMethod $method): SpecSerializeMethod
    {
        return new SpecSerializeMethod(
            $method->getProperties()
        );
    }
}
