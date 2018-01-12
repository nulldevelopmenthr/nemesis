<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\TacticianMiddleware;

use Exception;
use League\Tactician\Middleware;

/**
 * @see DefinitionGeneratorMiddlewareSpec
 * @see DefinitionGeneratorMiddlewareTest
 */
class DefinitionGeneratorMiddleware implements Middleware
{
    /** @var array */
    private $generators;

    public function __construct(array $generators)
    {
        $this->generators = $generators;
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    public function execute($command, callable $next)
    {
        foreach ($this->generators as $generator) {
            if ($generator->supports($command)) {
                return $generator->handle($command);
            }
        }

        throw new Exception('No generator found for '.get_class($command));
    }
}
