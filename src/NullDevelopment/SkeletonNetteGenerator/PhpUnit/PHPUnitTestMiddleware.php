<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit;

use League\Tactician\Middleware;

/**
 * @see PHPUnitTestMiddlewareSpec
 * @see PHPUnitTestMiddlewareTest
 */
class PHPUnitTestMiddleware implements Middleware
{
    private $generators;

    public function __construct(array $generators = [])
    {
        $this->generators = $generators;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $tests = [];

        foreach ($this->generators as $generator) {
            if ($generator->supports($command)) {
                $tests[] = $generator->generate($command);
            }
        }

        return array_merge($returnValue, $tests);
    }
}
