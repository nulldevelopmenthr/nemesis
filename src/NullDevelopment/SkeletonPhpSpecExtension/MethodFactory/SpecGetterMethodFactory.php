<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;

/**
 * @see SpecGetterMethodFactorySpec
 * @see SpecGetterMethodFactoryTest
 */
class SpecGetterMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
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

    public function createFromGetterMethod(GetterMethod $method): SpecGetterMethod
    {
        $methodName = $method->getName();
        if (preg_match('/get(?<methodName>.*)/', $methodName, $matches)) {
            $methodName = $matches['methodName'];
        }

        $snakeCasePropertyName = strtolower(preg_replace('/[A-Z]/', '_\\0', lcfirst($methodName)));

        return new SpecGetterMethod(
            'it_exposes_'.$snakeCasePropertyName,
            $method->getName(),
            $method->getProperty()
        );
    }
}
