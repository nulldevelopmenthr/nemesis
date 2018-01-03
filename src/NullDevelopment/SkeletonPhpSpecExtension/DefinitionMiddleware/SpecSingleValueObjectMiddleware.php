<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSingleValueObjectGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SingleValueObject;

/**
 * @see SpecSingleValueObjectMiddlewareSpec
 * @see SpecSingleValueObjectMiddlewareSpec
 */
class SpecSingleValueObjectMiddleware implements Middleware
{
    /** @var SpecSingleValueObjectFactory */
    private $factory;

    /** @var SpecSingleValueObjectGenerator */
    private $generator;

    public function __construct(SpecSingleValueObjectFactory $factory, SpecSingleValueObjectGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof SingleValueObject) {
            return $returnValue;
        }

        $specification = $this->factory->createFromSingleValueObject($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
