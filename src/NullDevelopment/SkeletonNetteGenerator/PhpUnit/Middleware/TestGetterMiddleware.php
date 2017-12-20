<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class TestGetterMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            // @var Property $property
            foreach ($definition->getProperties() as $property) {
                $body = sprintf(
                    'self::assertSame($this->%s, $this->sut->%s());',
                    $property->getName(),
                    'get'.ucfirst($property->getName())
                );

                $class->addMethod('testGet'.ucfirst($property->getName()))->addBody($body);
            }
        }

        return $namespace;
    }
}
