<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class InterfaceMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        $interface = $namespace->addInterface($definition->getClassName());

        if (true === $definition->hasParent()) {
            $interface->setExtends($definition->getParentFullClassName());
            $namespace->addUse($definition->getParentFullClassName());
        }

        return $namespace;
    }
}
