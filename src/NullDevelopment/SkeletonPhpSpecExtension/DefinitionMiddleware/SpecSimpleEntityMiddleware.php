<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\Result;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleEntityFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleEntityGenerator;

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
