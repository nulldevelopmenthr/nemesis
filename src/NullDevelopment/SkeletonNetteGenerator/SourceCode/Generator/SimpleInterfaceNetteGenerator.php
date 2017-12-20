<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\InterfaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\NamespaceMiddleware;

/**
 * @see SimpleInterfaceNetteGeneratorSpec
 * @see SimpleInterfaceNetteGeneratorTest
 */
class SimpleInterfaceNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new InterfaceMiddleware(),
            new NamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof InterfaceDefinition) {
            return true;
        }

        return false;
    }

    public function handleInterfaceDefinition(InterfaceDefinition $definition): array
    {
        return [$this->generate($definition)];
    }

    public function generate(InterfaceDefinition $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
