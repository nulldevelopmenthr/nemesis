<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSingleValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\Result;

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
