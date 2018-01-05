<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadEntity;

/**
 * @see SpecDoctrineReadEntityMiddlewareSpec
 * @see SpecDoctrineReadEntityMiddlewareTest
 */
class SpecDoctrineReadEntityMiddleware implements Middleware
{
    /** @var SpecDoctrineReadEntityFactory */
    private $factory;

    /** @var SpecDoctrineReadEntityGenerator */
    private $generator;

    public function __construct(SpecDoctrineReadEntityFactory $factory, SpecDoctrineReadEntityGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof DoctrineReadEntity) {
            return $returnValue;
        }

        $specification = $this->factory->createFromDoctrineReadEntity($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
