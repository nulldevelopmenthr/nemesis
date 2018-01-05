<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadEntity;

/**
 * @see TestDoctrineReadEntityMiddlewareSpec
 * @see TestDoctrineReadEntityMiddlewareTest
 */
class TestDoctrineReadEntityMiddleware implements Middleware
{
    /** @var TestDoctrineReadEntityFactory */
    private $factory;

    /** @var TestDoctrineReadEntityGenerator */
    private $generator;

    public function __construct(TestDoctrineReadEntityFactory $factory, TestDoctrineReadEntityGenerator $generator)
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
