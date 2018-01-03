<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method\CreateEventMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;

/**
 * @see TestCreateEventMethodFactorySpec
 * @see TestCreateEventMethodFactoryTest
 */
class TestCreateEventMethodFactory implements PhpUnitMethodFactory
{
    /** @return \NullDevelopment\PhpStructure\Behaviour\Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof CreateEventMethod) {
                $methods[] = $this->createFromCreateEventMethod($method);
            }
        }

        return $methods;
    }

    public function createFromCreateEventMethod(CreateEventMethod $method): TestCreateEventMethod
    {
        return new TestCreateEventMethod($method->getClassName(), $method->getParameters());
    }
}
