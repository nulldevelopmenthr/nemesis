<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerMiddlewareSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerMiddlewareTest
 */
class TestCommandHandlerMiddleware implements Middleware
{
    /** @var TestCommandHandlerFactory */
    private $factory;

    /** @var TestCommandHandlerNetteGenerator */
    private $generator;

    public function __construct(TestCommandHandlerFactory $factory, TestCommandHandlerNetteGenerator $generator)
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
