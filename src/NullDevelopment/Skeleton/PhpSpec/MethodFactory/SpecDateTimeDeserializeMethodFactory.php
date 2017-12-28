<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeDeserializeMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;

/**
 * @see SpecDateTimeDeserializeMethodFactorySpec
 * @see SpecDateTimeDeserializeMethodFactoryTest
 */
class SpecDateTimeDeserializeMethodFactory implements PhpSpecMethodFactory
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

    public function createFromDateTimeDeserializeMethod(DateTimeDeserializeMethod $method): SpecDateTimeDeserializeMethod
    {
        return new SpecDateTimeDeserializeMethod($method->getClassName());
    }
}
