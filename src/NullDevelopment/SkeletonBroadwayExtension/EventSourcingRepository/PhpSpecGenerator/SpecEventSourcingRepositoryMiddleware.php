<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryMiddlewareTest
 */
class SpecEventSourcingRepositoryMiddleware implements Middleware
{
    /** @var SpecEventSourcingRepositoryFactory */
    private $factory;

    /** @var SpecEventSourcingRepositoryNetteGenerator */
    private $generator;

    public function __construct(SpecEventSourcingRepositoryFactory $factory, SpecEventSourcingRepositoryNetteGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof EventSourcingRepository) {
            return $returnValue;
        }

        $specification = $this->factory->createFromEventSourcingRepository($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
