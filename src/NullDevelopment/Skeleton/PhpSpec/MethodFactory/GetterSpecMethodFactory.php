<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;

/**
 * @see GetterSpecMethodFactorySpec
 * @see GetterSpecMethodFactoryTest
 */
class GetterSpecMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof GetterMethod) {
                $methods[] = $this->createFromGetterMethod($method);
            }
        }

        return $methods;
    }

    public function createFromGetterMethod(GetterMethod $method): GetterSpecMethod
    {
        $methodName = $method->getName();
        if (preg_match('/get(?<methodName>.*)/', $methodName, $matches)) {
            $methodName = $matches['methodName'];
        }

        $snakeCasePropertyName = strtolower(preg_replace('/[A-Z]/', '_\\0', lcfirst($methodName)));

        return new GetterSpecMethod(
            'it_exposes_'.$snakeCasePropertyName,
            $method->getName(),
            $method->getProperty()
        );
    }
}
