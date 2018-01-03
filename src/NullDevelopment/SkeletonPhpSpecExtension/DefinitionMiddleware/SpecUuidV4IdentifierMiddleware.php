<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;

/**
 * @see SpecUuidV4IdentifierMiddlewareSpec
 * @see SpecUuidV4IdentifierMiddlewareTest
 */
class SpecUuidV4IdentifierMiddleware implements Middleware
{
    /** @var SpecUuidV4IdentifierFactory */
    private $factory;

    /** @var SpecUuidV4IdentifierGenerator */
    private $generator;

    public function __construct(SpecUuidV4IdentifierFactory $factory, SpecUuidV4IdentifierGenerator $generator)
    {
        $this->factory   = $factory;
        $this->generator = $generator;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        if (false === $command instanceof UuidV4Identifier) {
            return $returnValue;
        }

        $specification = $this->factory->createFromUuidV4Identifier($command);

        $generated = $this->generator->generate($specification);

        $result = new Result($specification, $generated);

        return array_merge($returnValue, [$result]);
    }
}
