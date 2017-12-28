<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeToStringMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;

/**
 * @see SpecDateTimeToStringMethodFactorySpec
 * @see SpecDateTimeToStringMethodFactoryTest
 */
class SpecDateTimeToStringMethodFactory implements PhpSpecMethodFactory
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
    public function createFromDateTimeToStringMethod(DateTimeToStringMethod $method): SpecDateTimeToStringMethod
    {
        return new SpecDateTimeToStringMethod();
    }
}
