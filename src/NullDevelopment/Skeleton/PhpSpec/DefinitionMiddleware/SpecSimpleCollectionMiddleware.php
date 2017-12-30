<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SpecSimpleCollectionMiddlewareSpec
 * @see SpecSimpleCollectionMiddlewareTest
 */
class SpecSimpleCollectionMiddleware implements Middleware
{
    /** @var SpecSimpleCollectionFactory */
    private $factory;

    /** @var SpecSimpleCollectionGenerator */
    private $generator;

    public function __construct(SpecSimpleCollectionFactory $factory, SpecSimpleCollectionGenerator $generator)
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
