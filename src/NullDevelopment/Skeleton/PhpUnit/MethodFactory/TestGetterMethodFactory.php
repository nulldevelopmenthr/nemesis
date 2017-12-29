<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpUnit\Method\TestGetterMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;

/**
 * @see TestGetterMethodFactorySpec
 * @see TestGetterMethodFactoryTest
 */
class TestGetterMethodFactory implements PhpUnitMethodFactory
{
    /** @return \NullDevelopment\PhpStructure\Behaviour\Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof GetterMethod) {
                $methods[] = $this->createFromGetterMethod($method);
            }
        }

        return $methods;
    }

    public function createFromGetterMethod(GetterMethod $method): TestGetterMethod
    {
        return new TestGetterMethod(
            'test'.ucfirst($method->getName()),
            $method->getName(),
            $method->getProperty()
        );
    }
}
