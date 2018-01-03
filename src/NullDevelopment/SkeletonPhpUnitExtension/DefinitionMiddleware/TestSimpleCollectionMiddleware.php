<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleCollectionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleCollection;

/**
 * @see TestSimpleCollectionMiddlewareSpec
 * @see TestSimpleCollectionMiddlewareTest
 */
class TestSimpleCollectionMiddleware implements Middleware
{
    /** @var TestSimpleCollectionFactory */
    private $factory;

    /** @var TestSimpleCollectionGenerator */
    private $generator;

    public function __construct(TestSimpleCollectionFactory $factory, TestSimpleCollectionGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof SimpleCollection) {
            return $returnValue;
        }

        $specification = $this->factory->createFromSimpleCollection($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
