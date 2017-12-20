<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator;

use Nette\PhpGenerator\PhpNamespace;

/** @SuppressWarnings("PHPMD.NumberOfChildren") */
abstract class BaseNetteGenerator
{
    /** @var callable */
    protected $middlewareChain;

    public function __construct(array $middleware)
    {
        $this->middlewareChain = $this->createExecutionChain($middleware);
    }

    abstract public function supports($definition): bool;

    //abstract public function generate($definition): PhpNamespace;

    private function createExecutionChain($middlewareList)
    {
        $lastCallable = function () {
            // the final callable is a no-op
        };

        while ($middleware = array_pop($middlewareList)) {
            $lastCallable = function ($command) use ($middleware, $lastCallable) {
                return $middleware->execute($command, $lastCallable);
            };
        }

        return $lastCallable;
    }
}
