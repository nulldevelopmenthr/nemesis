<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpUnit\Method\TestSerializeMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;

/**
 * @see TestSerializeMethodFactorySpec
 * @see TestSerializeMethodFactoryTest
 */
class TestSerializeMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
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
