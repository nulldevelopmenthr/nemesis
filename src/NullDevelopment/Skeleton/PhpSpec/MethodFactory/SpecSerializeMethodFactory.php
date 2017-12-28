<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecSerializeMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;

/**
 * @see SpecSerializeMethodFactorySpec
 * @see SpecSerializeMethodFactoryTest
 */
class SpecSerializeMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof SerializeMethod) {
                $methods[] = $this->createFromSerializeMethod($method);
            }
        }

        return $methods;
    }

    public function createFromSerializeMethod(SerializeMethod $method): SpecSerializeMethod
    {
        return new SpecSerializeMethod(
            $method->getProperties()
        );
    }
}
