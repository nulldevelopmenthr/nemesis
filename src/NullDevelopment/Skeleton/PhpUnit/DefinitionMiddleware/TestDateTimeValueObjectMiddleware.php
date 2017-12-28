<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see TestDateTimeValueObjectMiddlewareSpec
 * @see TestDateTimeValueObjectMiddlewareTest
 */
class TestDateTimeValueObjectMiddleware implements Middleware
{
    /** @var TestDateTimeValueObjectFactory */
    private $factory;
    /** @var TestDateTimeValueObjectGenerator */
    private $generator;

    public function __construct(TestDateTimeValueObjectFactory $factory, TestDateTimeValueObjectGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof DateTimeValueObject) {
            return $returnValue;
        }

        $specification = $this->factory->createFromDateTimeValueObject($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
