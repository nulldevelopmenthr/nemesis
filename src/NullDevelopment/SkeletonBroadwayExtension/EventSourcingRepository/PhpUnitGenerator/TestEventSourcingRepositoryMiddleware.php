<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryMiddlewareTest
 */
class TestEventSourcingRepositoryMiddleware implements Middleware
{
    /** @var TestEventSourcingRepositoryFactory */
    private $factory;

    /** @var TestEventSourcingRepositoryNetteGenerator */
    private $generator;

    public function __construct(
        TestEventSourcingRepositoryFactory $factory, TestEventSourcingRepositoryNetteGenerator $generator
    ) {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        // #byMiri We dont want to generate tests for eventsourcing repository

        return $returnValue;
        if (false === $command instanceof EventSourcingRepository) {
            return $returnValue;
        }

        $specification = $this->factory->createFromEventSourcingRepository($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
