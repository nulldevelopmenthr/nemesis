<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class ClassMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        $class = $namespace->addClass($definition->getClassName());

        if (true === $definition->hasParent()) {
            $class->setExtends($definition->getParentClassName());
            $namespace->addUse($definition->getParentFullClassName());
        }

        if (true === $definition->hasInterfaces()) {
            foreach ($definition->getInterfaces() as $interface) {
                $class->addImplement($interface->getName());
                $namespace->addUse($interface->getFullName());
            }
        }
        if (true === $definition->hasTraits()) {
            foreach ($definition->getTraits() as $trait) {
                $class->addTrait($trait->getClassName());
                $namespace->addUse($trait->getFullClassName());
            }
        }

        $class->addComment('@see \\spec\\'.$definition->getFullClassName().'Spec');
        $class->addComment('@see \\Tests\\'.$definition->getFullClassName().'Test');

        return $namespace;
    }
}
