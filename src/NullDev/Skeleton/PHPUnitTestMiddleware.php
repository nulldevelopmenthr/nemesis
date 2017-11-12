<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton;

use League\Tactician\Middleware;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see PHPUnitTestMiddlewareSpec
 * @see PHPUnitTestMiddlewareTest
 */
class PHPUnitTestMiddleware implements Middleware
{
    /** @var PHPUnitTestGenerator */
    private $testGenerator;

    public function __construct(PHPUnitTestGenerator $testGenerator)
    {
        $this->testGenerator = $testGenerator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $tests = [];

        foreach ($returnValue as $item) {
            if (ImprovedClassSource::class === get_class($item)) {
                $tests[] = $this->testGenerator->generate($item);
            }
        }

        return array_merge($returnValue, $tests);
    }
}
