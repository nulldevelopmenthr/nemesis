<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDeserializeMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;

/**
 * @see TestDeserializeMethodFactorySpec
 * @see TestDeserializeMethodFactoryTest
 */
class TestDeserializeMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
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
