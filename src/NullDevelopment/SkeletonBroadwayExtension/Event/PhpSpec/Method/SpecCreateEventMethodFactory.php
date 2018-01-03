<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method\CreateEventMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;

/**
 * @see SpecCreateEventMethodFactorySpec
 * @see SpecCreateEventMethodFactoryTest
 */
class SpecCreateEventMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
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

    public function createFromCreateEventMethod(CreateEventMethod $method): SpecCreateEventMethod
    {
        return new SpecCreateEventMethod($method->getClassName(), $method->getParameters());
    }
}
