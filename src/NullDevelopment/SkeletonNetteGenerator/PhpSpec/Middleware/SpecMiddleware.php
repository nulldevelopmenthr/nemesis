<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        $class = $namespace->addClass($definition->getClassName().'Spec');

        $class->setExtends('PhpSpec\\ObjectBehavior');
        $namespace->addUse('PhpSpec\\ObjectBehavior');
        $namespace->addUse('Prophecy\\Argument');
        $namespace->addUse($definition->getFullClassName());

        return $namespace;
    }
}
