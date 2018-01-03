<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventMiddlewareTest
 */
class SpecEventMiddleware implements Middleware
{
    /** @var SpecEventFactory */
    private $factory;

    /** @var SpecEventNetteGenerator */
    private $generator;

    public function __construct(SpecEventFactory $factory, SpecEventNetteGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof Event) {
            return $returnValue;
        }

        $specification = $this->factory->createFromEvent($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
