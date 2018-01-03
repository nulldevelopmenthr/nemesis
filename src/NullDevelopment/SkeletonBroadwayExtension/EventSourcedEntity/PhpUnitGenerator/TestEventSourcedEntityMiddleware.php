<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;
use NullDevelopment\SkeletonSourceCodeExtension\Result;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityMiddlewareTest
 */
class TestEventSourcedEntityMiddleware implements Middleware
{
    /** @var TestEventSourcedEntityFactory */
    private $factory;

    /** @var TestEventSourcedEntityNetteGenerator */
    private $generator;

    public function __construct(TestEventSourcedEntityFactory $factory, TestEventSourcedEntityNetteGenerator $generator)
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
