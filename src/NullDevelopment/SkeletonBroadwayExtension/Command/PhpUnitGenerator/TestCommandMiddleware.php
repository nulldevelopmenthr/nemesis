<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandMiddlewareTest
 */
class TestCommandMiddleware implements Middleware
{
    /** @var TestCommandFactory */
    private $factory;

    /** @var TestCommandNetteGenerator */
    private $generator;

    public function __construct(TestCommandFactory $factory, TestCommandNetteGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof Command) {
            return $returnValue;
        }

        $specification = $this->factory->createFromCommand($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
