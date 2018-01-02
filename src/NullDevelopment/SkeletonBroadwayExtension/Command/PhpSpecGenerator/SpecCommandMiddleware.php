<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandMiddlewareTest
 */
class SpecCommandMiddleware implements Middleware
{
    /** @var SpecCommandFactory */
    private $factory;

    /** @var SpecCommandNetteGenerator */
    private $generator;

    public function __construct(SpecCommandFactory $factory, SpecCommandNetteGenerator $generator)
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
