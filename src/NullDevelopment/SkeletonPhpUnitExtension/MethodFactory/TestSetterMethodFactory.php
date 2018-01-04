<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestSetterMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SetterMethod;

/**
 * @see TestSetterMethodFactorySpec
 * @see TestSetterMethodFactoryTest
 */
class TestSetterMethodFactory implements PhpUnitMethodFactory
{
    /** @return \NullDevelopment\PhpStructure\Behaviour\Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof SetterMethod) {
                $methods[] = $this->createFromSetterMethod($method);
            }
        }

        return $methods;
    }

    public function createFromSetterMethod(SetterMethod $method): TestSetterMethod
    {
        return new TestSetterMethod(
            'test'.ucfirst($method->getName()),
            $method->getName(),
            $method->getProperty()
        );
    }
}
