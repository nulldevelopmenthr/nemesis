<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SpecDateTimeValueObjectMiddlewareSpec
 * @see SpecDateTimeValueObjectMiddlewareTest
 */
class SpecDateTimeValueObjectMiddleware implements Middleware
{
    /** @var SpecDateTimeValueObjectFactory */
    private $factory;
    /** @var SpecDateTimeValueObjectGenerator */
    private $generator;

    public function __construct(SpecDateTimeValueObjectFactory $factory, SpecDateTimeValueObjectGenerator $generator)
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
