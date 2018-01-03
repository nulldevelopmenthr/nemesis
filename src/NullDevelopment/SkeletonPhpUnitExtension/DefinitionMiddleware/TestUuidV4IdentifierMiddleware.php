<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use League\Tactician\Middleware;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;

/**
 * @see TestUuidV4IdentifierMiddlewareSpec
 * @see TestUuidV4IdentifierMiddlewareTest
 */
class TestUuidV4IdentifierMiddleware implements Middleware
{
    /** @var TestUuidV4IdentifierFactory */
    private $factory;

    /** @var TestUuidV4IdentifierGenerator */
    private $generator;

    public function __construct(TestUuidV4IdentifierFactory $factory, TestUuidV4IdentifierGenerator $generator)
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
