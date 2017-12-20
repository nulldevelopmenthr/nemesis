<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\SetUpMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestGetterMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestNamespaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestSerializationMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestToStringMiddleware;

/**
 * @see SimpleIdentifierTestNetteGeneratorSpec
 * @see SimpleIdentifierTestNetteGeneratorTest
 */
class SimpleIdentifierTestNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new TestSerializationMiddleware(),
            new TestToStringMiddleware(),
            new TestGetterMiddleware(),
            new SetUpMiddleware(new ExampleMaker()),
            new TestMiddleware(),
            new TestNamespaceMiddleware(),
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

    public function generate(SimpleIdentifier $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
