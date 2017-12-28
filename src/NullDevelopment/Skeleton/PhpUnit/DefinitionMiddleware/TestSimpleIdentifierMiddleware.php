<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleIdentifierFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see TestSimpleIdentifierMiddlewareSpec
 * @see TestSimpleIdentifierMiddlewareTest
 */
class TestSimpleIdentifierMiddleware implements Middleware
{
    /** @var TestSimpleIdentifierFactory */
    private $factory;
    /** @var TestSimpleIdentifierGenerator */
    private $generator;

    public function __construct(TestSimpleIdentifierFactory $factory, TestSimpleIdentifierGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof SimpleIdentifier) {
            return $returnValue;
        }

        $specification = $this->factory->createFromSimpleIdentifier($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
