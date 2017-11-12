<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton;

use League\Tactician\Middleware;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see PhpSpecMiddlewareSpec
 * @see PhpSpecMiddlewareTest
 */
class PhpSpecMiddleware implements Middleware
{
    /** @var SpecGenerator */
    private $specGenerator;

    public function __construct(SpecGenerator $specGenerator)
    {
        $this->specGenerator = $specGenerator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $specs = [];

        foreach ($returnValue as $item) {
            if (ImprovedClassSource::class === get_class($item)) {
                $specs[] = $this->specGenerator->generate($item);
            }
        }

        return array_merge($returnValue, $specs);
    }
}
