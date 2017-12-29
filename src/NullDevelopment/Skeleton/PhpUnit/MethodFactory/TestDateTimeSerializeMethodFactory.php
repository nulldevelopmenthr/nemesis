<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeSerializeMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;

/**
 * @see TestDateTimeSerializeMethodFactorySpec
 * @see TestDateTimeSerializeMethodFactoryTest
 */
class TestDateTimeSerializeMethodFactory implements PhpUnitMethodFactory
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
    public function createFromDateTimeSerializeMethod(DateTimeSerializeMethod $method): TestDateTimeSerializeMethod
    {
        return new TestDateTimeSerializeMethod();
    }
}
