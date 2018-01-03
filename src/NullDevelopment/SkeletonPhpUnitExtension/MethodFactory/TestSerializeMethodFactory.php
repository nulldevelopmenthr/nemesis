<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestSerializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;

/**
 * @see TestSerializeMethodFactorySpec
 * @see TestSerializeMethodFactoryTest
 */
class TestSerializeMethodFactory implements PhpUnitMethodFactory
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

    public function createFromSerializeMethod(SerializeMethod $method): TestSerializeMethod
    {
        return new TestSerializeMethod(
            $method->getProperties()
        );
    }
}
