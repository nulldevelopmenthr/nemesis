<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootMiddlewareTest
 */
class TestEventSourcedAggregateRootMiddleware implements Middleware
{
    /** @var TestEventSourcedAggregateRootFactory */
    private $factory;

    /** @var TestEventSourcedAggregateRootNetteGenerator */
    private $generator;

    public function __construct(TestEventSourcedAggregateRootFactory $factory, TestEventSourcedAggregateRootNetteGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        // #453 We dont want to generate test for event sourced aggregate root
        return $returnValue;

        if (false === $command instanceof EventSourcedAggregateRoot) {
            return $returnValue;
        }

        $specification = $this->factory->createFromEventSourcedAggregateRoot($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
