<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootMiddlewareTest
 */
class SpecEventSourcedAggregateRootMiddleware implements Middleware
{
    /** @var SpecEventSourcedAggregateRootFactory */
    private $factory;

    /** @var SpecEventSourcedAggregateRootNetteGenerator */
    private $generator;

    public function __construct(SpecEventSourcedAggregateRootFactory $factory, SpecEventSourcedAggregateRootNetteGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof EventSourcedAggregateRoot) {
            return $returnValue;
        }

        $specification = $this->factory->createFromEventSourcedAggregateRoot($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
