<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeDeserializeMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;

/**
 * @see TestDateTimeDeserializeMethodFactorySpec
 * @see TestDateTimeDeserializeMethodFactoryTest
 */
class TestDateTimeDeserializeMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof DateTimeDeserializeMethod) {
                $methods[] = $this->createFromDateTimeDeserializeMethod($method);
            }
        }

        return $methods;
    }

    public function createFromDateTimeDeserializeMethod(DateTimeDeserializeMethod $method): TestDateTimeDeserializeMethod
    {
        return new TestDateTimeDeserializeMethod($method->getClassName());
    }
}
