<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Definition\SimpleValueObject;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\LetMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecGetterMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecNamespaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecSerializationMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecToStringMiddleware;

/**
 * @see SimpleValueObjectSpecNetteGeneratorSpec
 * @see SimpleValueObjectSpecNetteGeneratorTest
 */
class SimpleValueObjectSpecNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SpecSerializationMiddleware(new ExampleMaker()),
            new SpecToStringMiddleware(new ExampleMaker()),
            new SpecGetterMiddleware(new ExampleMaker()),
            new LetMiddleware(new ExampleMaker()),
            new SpecMiddleware(),
            new SpecNamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleValueObject) {
            return true;
        }

        return false;
    }

    public function generate(SimpleValueObject $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
