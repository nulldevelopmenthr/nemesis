<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleCollection;
use NullDevelopment\SkeletonSourceCodeExtension\Result;

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
