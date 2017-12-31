<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;

/**
 * @see SpecToStringMethodFactorySpec
 * @see SpecToStringMethodFactoryTest
 */
class SpecToStringMethodFactory implements PhpSpecMethodFactory
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

    public function createFromToStringMethod(ToStringMethod $method): SpecToStringMethod
    {
        return new SpecToStringMethod(
            $method->getProperty()
        );
    }
}
