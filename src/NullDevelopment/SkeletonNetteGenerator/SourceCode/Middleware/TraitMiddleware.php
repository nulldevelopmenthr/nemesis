<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class TraitMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        $trait = $namespace->addTrait($definition->getClassName());

        if (true === $definition->hasTraits()) {
            foreach ($definition->getTraits() as $trait) {
                $trait->addTrait($trait->getClassName());
                $namespace->addUse($trait->getFullClassName());
            }
        }

        return $namespace;
    }
}
