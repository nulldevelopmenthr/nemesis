<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

use Webmozart\Assert\Assert;

/**
 * @see ContextNamespaceSpec
 * @see ContextNamespaceTest
 */
class ContextNamespace
{
    /** @var string */
    private $namespace;

    public function __construct(string $namespace)
    {
        Assert::notEmpty($namespace, 'Namespace should not be empty.');

        Assert::false(substr($namespace, -1) === '\\', 'Namespace must not end with \\.');

        $this->namespace = $namespace;
    }

    public function getValue(): string
    {
        return $this->namespace;
    }

    public function __toString(): string
    {
        return $this->namespace;
    }
}
