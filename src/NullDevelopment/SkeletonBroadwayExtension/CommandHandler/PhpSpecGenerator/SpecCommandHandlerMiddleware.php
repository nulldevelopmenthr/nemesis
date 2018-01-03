<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerMiddlewareTest
 */
class SpecCommandHandlerMiddleware implements Middleware
{
    /** @var SpecCommandHandlerFactory */
    private $factory;

    /** @var SpecCommandHandlerNetteGenerator */
    private $generator;

    public function __construct(SpecCommandHandlerFactory $factory, SpecCommandHandlerNetteGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof CommandHandler) {
            return $returnValue;
        }

        $specification = $this->factory->createFromCommandHandler($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
