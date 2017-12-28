<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class TestToStringMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            // @var Property $property
            foreach ($definition->getProperties() as $property) {
                if (true === in_array($property->getInstanceFullName(), ['int', 'float'])) {
                    $body = sprintf('self::assertSame((string) $this->%s, $this->sut->__toString());', $property->getName());
                } elseif (true === in_array($property->getInstanceFullName(), ['bool'])) {
                    $body = 'self::assertSame(\'true\', $this->sut->__toString());';
                } else {
                    $body = sprintf('self::assertSame($this->%s, $this->sut->__toString());', $property->getName());
                }

                $class->addMethod('testToString')->addBody($body);
            }
        }

        return $namespace;
    }
}
