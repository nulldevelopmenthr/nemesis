<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadRepository;

/**
 * @see SpecDoctrineReadRepositoryMiddlewareSpec
 * @see SpecDoctrineReadRepositoryMiddlewareTest
 */
class SpecDoctrineReadRepositoryMiddleware implements Middleware
{
    /** @var SpecDoctrineReadRepositoryFactory */
    private $factory;

    /** @var SpecDoctrineReadRepositoryGenerator */
    private $generator;

    public function __construct(SpecDoctrineReadRepositoryFactory $factory, SpecDoctrineReadRepositoryGenerator $generator)
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
