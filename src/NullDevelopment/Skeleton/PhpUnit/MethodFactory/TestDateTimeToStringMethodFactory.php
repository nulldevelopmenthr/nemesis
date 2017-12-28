<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeToStringMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;

/**
 * @see TestDateTimeToStringMethodFactorySpec
 * @see TestDateTimeToStringMethodFactoryTest
 */
class TestDateTimeToStringMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
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
    public function createFromDateTimeToStringMethod(DateTimeToStringMethod $method): TestDateTimeToStringMethod
    {
        return new TestDateTimeToStringMethod();
    }
}
