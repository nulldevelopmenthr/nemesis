<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleEntityFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleEntityGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see TestSimpleEntityMiddlewareSpec
 * @see TestSimpleEntityMiddlewareTest
 */
class TestSimpleEntityMiddleware implements Middleware
{
    /** @var TestSimpleEntityFactory */
    private $factory;
    /** @var TestSimpleEntityGenerator */
    private $generator;

    public function __construct(TestSimpleEntityFactory $factory, TestSimpleEntityGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof SimpleEntity) {
            return $returnValue;
        }

        $specification = $this->factory->createFromSimpleEntity($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
