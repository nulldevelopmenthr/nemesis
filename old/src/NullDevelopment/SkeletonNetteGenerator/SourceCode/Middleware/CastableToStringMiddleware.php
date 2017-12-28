<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class CastableToStringMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            /** @var Property $property */
            foreach ($definition->getProperties() as $property) {
                $toStringMethod = $class->addMethod('__toString')
                    ->setReturnType('string');

                if ('bool' === $property->getInstanceFullName()) {
                    $toStringMethod->addBody('if(true === $this->'.$property->getName().'){');
                    $toStringMethod->addBody("    return 'true';");
                    $toStringMethod->addBody('}else{');
                    $toStringMethod->addBody("    return 'false';");
                    $toStringMethod->addBody('}');
                } elseif ('string' === $property->getInstanceFullName()) {
                    $toStringMethod->addBody('return $this->'.$property->getName().';');
                } else {
                    $toStringMethod->addBody('return (string) $this->'.$property->getName().';');
                }
            }
        }

        return $namespace;
    }
}
