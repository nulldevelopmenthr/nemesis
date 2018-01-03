<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeDeserializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeDeserializeMethod;

/**
 * @see TestDateTimeDeserializeMethodFactorySpec
 * @see TestDateTimeDeserializeMethodFactoryTest
 */
class TestDateTimeDeserializeMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
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
