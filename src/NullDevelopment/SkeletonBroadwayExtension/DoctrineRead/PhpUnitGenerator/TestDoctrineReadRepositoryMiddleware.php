<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadRepository;

/**
 * @see TestDoctrineReadRepositoryMiddlewareSpec
 * @see TestDoctrineReadRepositoryMiddlewareTest
 */
class TestDoctrineReadRepositoryMiddleware implements Middleware
{
    /** @var TestDoctrineReadRepositoryFactory */
    private $factory;

    /** @var TestDoctrineReadRepositoryGenerator */
    private $generator;

    public function __construct(TestDoctrineReadRepositoryFactory $factory, TestDoctrineReadRepositoryGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof DoctrineReadRepository) {
            return $returnValue;
        }

        $specification = $this->factory->createFromDoctrineReadRepository($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
