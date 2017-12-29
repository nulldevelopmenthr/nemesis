<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeSetUpMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;

/**
 * @see TestDateTimeSetUpMethodFactorySpec
 * @see TestDateTimeSetUpMethodFactoryTest
 */
class TestDateTimeSetUpMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        return [
            $this->createFromConstructorMethod($definition->getName()),
        ];
    }

    public function createFromConstructorMethod(ClassName $className): TestDateTimeSetUpMethod
    {
        return new TestDateTimeSetUpMethod($className);
    }
}
