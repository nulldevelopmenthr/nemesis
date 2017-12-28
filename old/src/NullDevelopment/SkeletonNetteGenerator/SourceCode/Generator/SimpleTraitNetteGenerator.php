<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\TraitDefinition;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\NamespaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\TraitMiddleware;

/**
 * @see SimpleTraitNetteGeneratorSpec
 * @see SimpleTraitNetteGeneratorTest
 */
class SimpleTraitNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new TraitMiddleware(),
            new NamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof TraitDefinition) {
            return true;
        }

        return false;
    }

    public function handleTraitDefinition(TraitDefinition $definition): array
    {
        return [$this->generate($definition)];
    }

    public function generate(TraitDefinition $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
