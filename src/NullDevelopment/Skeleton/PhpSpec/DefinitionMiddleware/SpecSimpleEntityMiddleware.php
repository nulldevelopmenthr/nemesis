<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleEntityFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleEntityGenerator;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SpecSimpleEntityMiddlewareSpec
 * @see SpecSimpleEntityMiddlewareTest
 */
class SpecSimpleEntityMiddleware implements Middleware
{
    /** @var SpecSimpleEntityFactory */
    private $factory;
    /** @var SpecSimpleEntityGenerator */
    private $generator;

    public function __construct(SpecSimpleEntityFactory $factory, SpecSimpleEntityGenerator $generator)
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
