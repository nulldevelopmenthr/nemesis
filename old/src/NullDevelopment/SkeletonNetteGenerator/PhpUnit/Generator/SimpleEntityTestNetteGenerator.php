<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Definition\SimpleEntity;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\SetUpMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestGetterMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestNamespaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestSerializationMiddleware;

/**
 * @see SimpleEntityTestNetteGeneratorSpec
 * @see SimpleEntityTestNetteGeneratorTest
 */
class SimpleEntityTestNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new TestSerializationMiddleware(),
            new TestGetterMiddleware(),
            new SetUpMiddleware(new ExampleMaker()),
            new TestMiddleware(),
            new TestNamespaceMiddleware(),
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
        /** @var PhpNamespace $namespace */
        $namespace       = $middlewareChain($definition);

        //@TODO: move this to a middleware!
        if (count($namespace->getUses()) > 10) {
            foreach ($namespace->getClasses() as $class) {
                $class->addComment('@SuppressWarnings(PHPMD.CouplingBetweenObjects)');
            }
        }

        return $namespace;
    }
}
