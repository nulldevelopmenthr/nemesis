<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Definition\SimpleEntity;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\LetMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecGetterMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecNamespaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecSerializationMiddleware;

/**
 * @see SimpleEntitySpecNetteGeneratorSpec
 * @see SimpleEntitySpecNetteGeneratorTest
 */
class SimpleEntitySpecNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SpecSerializationMiddleware(new ExampleMaker()),
            new SpecGetterMiddleware(new ExampleMaker()),
            new LetMiddleware(new ExampleMaker()),
            new SpecMiddleware(),
            new SpecNamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleEntity) {
            return true;
        }

        return false;
    }

    public function generate(SimpleEntity $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
