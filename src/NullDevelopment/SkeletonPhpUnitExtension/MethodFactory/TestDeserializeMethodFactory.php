<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDeserializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;

/**
 * @see TestDeserializeMethodFactorySpec
 * @see TestDeserializeMethodFactoryTest
 */
class TestDeserializeMethodFactory implements PhpUnitMethodFactory
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

    public function createFromDeserializeMethod(DeserializeMethod $method): TestDeserializeMethod
    {
        return new TestDeserializeMethod(
            $method->getClassName(),
            $method->getProperties()
        );
    }
}
