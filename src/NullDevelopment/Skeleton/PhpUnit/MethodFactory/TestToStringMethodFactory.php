<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpUnit\Method\TestToStringMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;

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
