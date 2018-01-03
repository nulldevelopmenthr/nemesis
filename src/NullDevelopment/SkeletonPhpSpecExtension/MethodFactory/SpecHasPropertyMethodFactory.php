<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecHasPropertyMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\HasPropertyMethod;

/**
 * @see SpecHasPropertyMethodFactorySpec
 * @see SpecHasPropertyMethodFactoryTest
 */
class SpecHasPropertyMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof HasPropertyMethod) {
                $methods[] = $this->createFromHasPropertyMethod($method);
            }
        }

        return $methods;
    }

    public function createFromHasPropertyMethod(HasPropertyMethod $method): SpecHasPropertyMethod
    {
        $methodName = $method->getName();
        if (preg_match('/get(?<methodName>.*)/', $methodName, $matches)) {
            $methodName = $matches['methodName'];
        }

        $snakeCasePropertyName = strtolower(preg_replace('/[A-Z]/', '_\\0', lcfirst($methodName)));

        return new SpecHasPropertyMethod(
            'it_'.$snakeCasePropertyName,
            $method->getName(),
            $method->getProperty()
        );
    }
}
