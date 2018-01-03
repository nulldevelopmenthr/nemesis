<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeToStringMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeToStringMethod;

/**
 * @see TestDateTimeToStringMethodFactorySpec
 * @see TestDateTimeToStringMethodFactoryTest
 */
class TestDateTimeToStringMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
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
