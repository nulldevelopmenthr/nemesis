<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSingleValueObjectFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see TestSingleValueObjectMiddlewareSpec
 * @see TestSingleValueObjectMiddlewareSpec
 */
class TestSingleValueObjectMiddleware implements Middleware
{
    /** @var TestSingleValueObjectFactory */
    private $factory;
    /** @var TestSingleValueObjectGenerator */
    private $generator;

    public function __construct(TestSingleValueObjectFactory $factory, TestSingleValueObjectGenerator $generator)
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
