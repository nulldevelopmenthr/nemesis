<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec;

use League\Tactician\Middleware;

/**
 * @see PHPUnitSpecMiddlewareSpec
 * @see PHPUnitSpecMiddlewareSpec
 */
class PHPSpecMiddleware implements Middleware
{
    private $generators;

    public function __construct(array $generators = [])
    {
        $this->generators = $generators;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $specs = [];

        foreach ($this->generators as $generator) {
            if ($generator->supports($command)) {
                $specs[] = $generator->generate($command);
            }
        }

        return array_merge($returnValue, $specs);
    }
}
