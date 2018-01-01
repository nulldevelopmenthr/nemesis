<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode\Method\HasPropertyMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestHasPropertyMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;

/**
 * @see TestHasPropertyMethodFactorySpec
 * @see TestHasPropertyMethodFactoryTest
 */
class TestHasPropertyMethodFactory implements PhpUnitMethodFactory
{
    /** @return \NullDevelopment\PhpStructure\Behaviour\Method[] */
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

    public function createFromHasPropertyMethod(HasPropertyMethod $method): TestHasPropertyMethod
    {
        return new TestHasPropertyMethod(
            'test'.ucfirst($method->getName()),
            $method->getName(),
            $method->getProperty()
        );
    }
}
