<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleIdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleIdentifierGenerator;

/**
 * @see SpecSimpleIdentifierMiddlewareSpec
 * @see SpecSimpleIdentifierMiddlewareTest
 */
class SpecSimpleIdentifierMiddleware implements Middleware
{
    /** @var SpecSimpleIdentifierFactory */
    private $factory;

    /** @var SpecSimpleIdentifierGenerator */
    private $generator;

    public function __construct(SpecSimpleIdentifierFactory $factory, SpecSimpleIdentifierGenerator $generator)
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
