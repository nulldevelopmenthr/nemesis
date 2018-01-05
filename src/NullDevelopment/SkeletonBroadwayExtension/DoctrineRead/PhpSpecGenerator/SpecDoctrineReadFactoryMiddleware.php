<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadFactoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadFactory;

/**
 * @see SpecDoctrineReadFactoryMiddlewareSpec
 * @see SpecDoctrineReadFactoryMiddlewareTest
 */
class SpecDoctrineReadFactoryMiddleware implements Middleware
{
    /** @var SpecDoctrineReadFactoryFactory */
    private $factory;

    /** @var SpecDoctrineReadFactoryGenerator */
    private $generator;

    public function __construct(SpecDoctrineReadFactoryFactory $factory, SpecDoctrineReadFactoryGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof DoctrineReadFactory) {
            return $returnValue;
        }

        $specification = $this->factory->createFromDoctrineReadFactory($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
