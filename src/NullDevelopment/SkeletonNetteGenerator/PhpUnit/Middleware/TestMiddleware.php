<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class TestMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        $class = $namespace->addClass($definition->getClassName().'Test');

        $class->setExtends('PHPUnit\\Framework\\TestCase');
        $namespace->addUse('PHPUnit\\Framework\\TestCase');
        $namespace->addUse($definition->getFullClassName());
        $class->addComment('@covers \\'.$definition->getFullClassName());
        $class->addComment('@group  todo');

        foreach ($definition->getProperties() as $property) {
            $class->addProperty($property->getName())
                ->setVisibility(Visibility::PRIVATE)
                ->addComment('@var '.$property->getInstanceName()->getName());
        }
        $class->addProperty('sut')
            ->setVisibility(Visibility::PRIVATE)
            ->addComment('@var '.$definition->getClassName());

        return $namespace;
    }
}
