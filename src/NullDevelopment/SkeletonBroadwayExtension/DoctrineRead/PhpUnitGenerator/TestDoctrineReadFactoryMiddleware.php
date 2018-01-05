<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadFactoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadFactory;

/**
 * @see TestDoctrineReadFactoryMiddlewareSpec
 * @see TestDoctrineReadFactoryMiddlewareTest
 */
class TestDoctrineReadFactoryMiddleware implements Middleware
{
    /** @var TestDoctrineReadFactoryFactory */
    private $factory;

    /** @var TestDoctrineReadFactoryGenerator */
    private $generator;

    public function __construct(TestDoctrineReadFactoryFactory $factory, TestDoctrineReadFactoryGenerator $generator)
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
