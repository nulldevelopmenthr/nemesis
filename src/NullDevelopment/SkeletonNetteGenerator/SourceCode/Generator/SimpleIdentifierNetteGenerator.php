<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Definition\SimpleIdentifier;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\CastableToStringMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ClassMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ConstructorMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\NamespaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\SerializationMiddleware;

/**
 * @see SimpleIdentifierNetteGeneratorSpec
 * @see SimpleIdentifierNetteGeneratorTest
 */
class SimpleIdentifierNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SerializationMiddleware(),
            new CastableToStringMiddleware(),
            new ConstructorMiddleware(),
            new ClassMiddleware(),
            new NamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleIdentifier) {
            return true;
        }

        return false;
    }

    public function handleSimpleIdentifier(SimpleIdentifier $definition): array
    {
        return [$this->generate($definition)];
    }

    public function generate(SimpleIdentifier $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}