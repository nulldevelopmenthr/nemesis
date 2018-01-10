<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadProjectorFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjector;

/**
 * @see TestDoctrineReadProjectorMiddlewareSpec
 * @see TestDoctrineReadProjectorMiddlewareTest
 */
class TestDoctrineReadProjectorMiddleware implements Middleware
{
    /** @var TestDoctrineReadProjectorFactory */
    private $factory;

    /** @var TestDoctrineReadProjectorGenerator */
    private $generator;

    public function __construct(
        TestDoctrineReadProjectorFactory $factory, TestDoctrineReadProjectorGenerator $generator
    ) {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof DoctrineReadProjector) {
            return $returnValue;
        }

        $specification = $this->factory->createFromDoctrineReadProjector($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
