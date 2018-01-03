<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use NullDevelopment\SkeletonSourceCodeExtension\Result;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventMiddlewareTest
 */
class TestEventMiddleware implements Middleware
{
    /** @var TestEventFactory */
    private $factory;

    /** @var TestEventNetteGenerator */
    private $generator;

    public function __construct(TestEventFactory $factory, TestEventNetteGenerator $generator)
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
