<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityMiddlewareTest
 */
class SpecEventSourcedEntityMiddleware implements Middleware
{
    /** @var SpecEventSourcedEntityFactory */
    private $factory;

    /** @var SpecEventSourcedEntityNetteGenerator */
    private $generator;

    public function __construct(SpecEventSourcedEntityFactory $factory, SpecEventSourcedEntityNetteGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof EventSourcedEntity) {
            return $returnValue;
        }

        $specification = $this->factory->createFromEventSourcedEntity($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
