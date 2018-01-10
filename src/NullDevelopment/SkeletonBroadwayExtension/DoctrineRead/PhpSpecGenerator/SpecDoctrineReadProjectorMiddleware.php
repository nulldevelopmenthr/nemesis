<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadProjectorFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjector;

/**
 * @see SpecDoctrineReadProjectorMiddlewareSpec
 * @see SpecDoctrineReadProjectorMiddlewareTest
 */
class SpecDoctrineReadProjectorMiddleware implements Middleware
{
    /** @var SpecDoctrineReadProjectorFactory */
    private $factory;

    /** @var SpecDoctrineReadProjectorGenerator */
    private $generator;

    public function __construct(
        SpecDoctrineReadProjectorFactory $factory, SpecDoctrineReadProjectorGenerator $generator
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
