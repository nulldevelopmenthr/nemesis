<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestToStringMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;

/**
 * @see TestToStringMethodFactorySpec
 * @see TestToStringMethodFactoryTest
 */
class TestToStringMethodFactory implements PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof ToStringMethod) {
                $methods[] = $this->createFromToStringMethod($method);
            }
        }

        return $methods;
    }

    public function createFromToStringMethod(ToStringMethod $method): TestToStringMethod
    {
        return new TestToStringMethod(
            $method->getProperty()
        );
    }
}
